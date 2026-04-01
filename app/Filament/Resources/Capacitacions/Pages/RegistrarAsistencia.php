<?php

namespace App\Filament\Resources\CapacitacionResource\Pages;

use App\Filament\Resources\Capacitacions\CapacitacionResource;
use App\Models\Alumno;
use App\Models\Asistencia;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RegistrarAsistencia extends Page implements HasForms
{
    use InteractsWithRecord; // <--- Añadir esto
    
    protected static string $resource = CapacitacionResource::class;
    protected string $view = 'filament.resources.capacitacions.pages.registrar-asistencia';

    public ?array $data = [];


    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);
        
        // Inicializamos con la fecha de hoy
        $this->form->fill([
            'fecha' => now()->format('Y-m-d'),
        ]);
        
        $this->cargarAsistencia();
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Control de Asistencia')
                    ->description("Capacitación: {$this->record->nombre}")
                    ->schema([
                        DatePicker::make('fecha')
                            ->label('Fecha de la Sesión')
                            ->required()
                            ->live() // Al cambiar la fecha, ejecutamos lógica
                            ->afterStateUpdated(fn () => $this->cargarAsistencia()),

                        CheckboxList::make('asistentes')
                            ->label('Alumnos Presentes')
                            ->options(
                                // Solo alumnos inscritos en esta capacitación
                                $this->record->alumnos()->pluck('name', 'id')
                            )
                            ->descriptions(
                                $this->record->alumnos()->pluck('email', 'id')
                            )
                            ->columns(2)
                            ->bulkToggleable() // Permite marcar "Todos" o "Ninguno" rápidamente
                            ->searchable(),
                    ]),
            ])
            ->statePath('data');
    }

    public function cargarAsistencia(): void
    {
        $fecha = $this->data['fecha'];
        
        // Buscamos quiénes ya tienen asistencia guardada ese día
        $asistentesIds = Asistencia::where('capacitacion_id', $this->record->id)
            ->where('fecha', $fecha)
            ->where('asistio', true)
            ->pluck('alumno_id')
            ->toArray();

        $this->form->fill([
            'fecha' => $fecha,
            'asistentes' => $asistentesIds,
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $fecha = $data['fecha'];
        $asistentes = $data['asistentes']; // IDs de los alumnos marcados
        
        // 1. Marcar como "No asistió" a todos los inscritos primero (Reset)
        Asistencia::where('capacitacion_id', $this->record->id)
            ->where('fecha', $fecha)
            ->update(['asistio' => false]);

        // 2. Crear o actualizar los que sí asistieron
        foreach ($asistentes as $alumnoId) {
            Asistencia::updateOrCreate(
                [
                    'capacitacion_id' => $this->record->id,
                    'alumno_id' => $alumnoId,
                    'fecha' => $fecha,
                ],
                ['asistio' => true]
            );
        }

        \Filament\Notifications\Notification::make()
            ->success()
            ->title('Asistencia actualizada correctamente')
            ->send();
    }
}