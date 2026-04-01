<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;

class ReporteCustom extends Page implements HasTable, HasForms
{
    
    use InteractsWithTable, InteractsWithForms;

    #[Url]
    public ?int $capacitacion_id = null;

    protected string $view = 'filament.pages.reporte-custom';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-table-cells';

    // Propiedad para el buscador
    public ?array $headerData = [];


    public function mount(): void
    {
        // Get 'id' from the URL parameter (e.g., /admin/reporte-custom/5)
        //$idFromUrl = request()->route('record');
        $this->headerForm->fill([
            'capacitacion_id' => $this->capacitacion_id
        ]);
    }

    protected function getForms(): array
    {
        return [
            'headerForm', // <--- Añade esto para que Livewire lo encuentre
            'form',       // Si tienes el formulario estándar de la página
        ];
    }

    // Formulario de la fila superior (Buscador + Botón)
    public function headerForm(Schema $form): Schema
    {
        return $form
        ->schema([
            Select::make('user_id')
                ->hiddenLabel()
                ->placeholder('Escribe para buscar un registro...')
                ->searchable()
                // Aquí es donde sucede la magia del SQL Custom
                ->getSearchResultsUsing(function (string $search): array {
                    return DB::table('users') // O tu consulta SQL compleja
                        ->where('name', 'like', "%{$search}%")
                        ->limit(10)
                        ->pluck('name', 'id') // 'nombre' se muestra, 'id' se guarda
                        ->toArray();
                })
                ->getOptionLabelUsing(fn ($value): ?string => DB::table('users')->find($value)?->name)
                ->columnSpan(2), // Ajusta el ancho aquí

            Actions::make([
                Action::make('registrar')
                    ->label('Registrar')
                    ->icon('heroicon-m-plus')
                    ->color('primary')
                    ->size('lg')
                    ->action(fn () => $this->registrarAction()),
            ])
            ->columnSpan(1) // Ocupa la última columna
            ->alignStart(),   // Lo pega a la derecha
        ])
        ->statePath('headerData')
        ->columns(6); // Definimos 4 columnas en total para la fila
    }

    // Configuración de la Tabla con SQL Custom
    public function table(Table $table): Table
    {
        

        return $table
            ->query(function () {
                $search = $this->headerData['search'] ?? null;
                $capacitacionId = 1;
                // Consulta SQL Custom
                $query = User::query()
                    ->select('id','name', 'email', 'created_at');

                if ($capacitacionId) {
                    // Filtra usuarios que tengan una relación con esa capacitación
                    $query->whereHas('capacitacions', function ($q) use ($capacitacionId) {
                        $q->where('capacitacions.id', $capacitacionId);
                    });
                } else {
                    // Si no hay capacitación seleccionada, podrías querer 
                    // que la tabla esté vacía por defecto:
                    $query->whereRaw('1 = 0'); 
                }

                return $query;
            })
            ->columns([
                TextColumn::make('name')->label('Nombre'),
                TextColumn::make('email')->label('Correo'),
                TextColumn::make('created_at')->label('Fecha')->date(),
            ])
            ->actions([
                Action::make('remover')
                    ->label('Remover')
                    ->icon('heroicon-o-minus-circle') // Icono de círculo con menos
                    ->color('danger') // Color rojo
                    ->requiresConfirmation() // Muestra un modal de confirmación
                    ->modalHeading('¿Remover usuario?')
                    ->modalDescription('El usuario dejará de estar inscrito en esta capacitación.')
                    ->action(function (User $record) {
                        // $record es el usuario de la fila actual
                        $capacitacionId = $this->headerData['capacitacion_id'];

                        // Removemos la relación en la tabla pivote
                        $record->capacitacions()->detach($capacitacionId);

                        Notification::make()
                            ->title('Usuario removido')
                            ->success()
                            ->send();
                    })
        ]);
    }

    // Acción del botón Registrar
    public function registrarAction()
    {
        
       
        $user = User::find($this->headerData['user_id']);

        $existe = $user->capacitacions()
                    ->where('capacitacion_id', $this->headerData['capacitacion_id'])
                    ->exists();

        if ($existe) {
            Notification::make()
                ->title('Usuario ya registrado')
                ->warning()
                ->body('Este usuario ya se encuentra inscrito en esta capacitación.')
                ->send();

            return; // Detenemos la ejecución
        }

        if ($user) {

            $user->capacitacions()->attach($this->headerData['capacitacion_id']);
            Notification::make()
                ->title('Registro completado')
                ->success()
                ->send();

            // Opcional: Limpiar el formulario después de registrar
            $this->form->fill();
        }

    }
}

?>