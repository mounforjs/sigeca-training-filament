<?php


namespace App\Filament\Schemas;

use App\Models\User;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationSchema
{
    /**
     * Define el esquema del formulario de registro.
     * * @return array
     */
    public static function make(): array
    {
        return [
            // Agrupamos los campos en una sección para que se vea mejor en el panel
            Section::make('Información de la Cuenta')
                ->description('Introduce los datos básicos para el nuevo perfil.')
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre Completo')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Ej. Alex Dev'),

                    TextInput::make('email')
                        ->label('Correo Electrónico')
                        ->email()
                        ->required()
                        ->unique(User::class, 'email', ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder('alex@ejemplo.com'),
                ])->columns(2),

            Section::make('Seguridad')
                ->description('Configura una contraseña segura.')
                ->schema([
                    TextInput::make('password')
                        ->label('Contraseña')
                        ->password()
                        ->required()
                        ->rule(Password::default())
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->same('password_confirmation')
                        ->validationAttribute('contraseña'),

                    TextInput::make('password_confirmation')
                        ->label('Confirmar Contraseña')
                        ->password()
                        ->required()
                        ->dehydrated(false),
                ])->columns(2),
        ];
    }
}
?>