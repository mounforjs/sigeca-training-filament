<?php

namespace App\Filament\Pages;

use App\Filament\Schemas\RegistrationSchema;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;

class RegistroPersonalizado extends Page implements HasForms
{
    use InteractsWithForms;

    // v4 Type: Must match parent (string|BackedEnum|null)
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-plus';

    // Must be NON-STATIC for custom pages
    protected string $view = 'filament.pages.registro-personalizado';

    // 1. Define el nombre del grupo (Categoría)
    protected static string | \UnitEnum | null $navigationGroup = 'Settings > Users';

    
    public ?array $data = []; // 1. Propiedad de estado



    public function mount(): void
    {
        $this->form->fill(); // 2. Inicialización
    }


    protected function getForms(): array
    {
        return [
            'form', // Registramos el formulario principal
        ];
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema(RegistrationSchema::make())
            ->statePath('data');
    }

    public function submit(): void
    {
        $state = $this->form->getState();
        // Lógica de guardado...

        User::create($state);

        \Filament\Notifications\Notification::make()
            ->title('¡Usuario creado!')
            ->success()
            ->send();

        $this->form->fill();
    }
}

?>