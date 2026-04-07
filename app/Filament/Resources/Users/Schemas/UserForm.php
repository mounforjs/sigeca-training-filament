<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Registro')
                    ->description('Datos del usuario')
                    ->schema([
                        TextInput::make('Nombre')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required()
                            ->live()
                            ->unique(ignoreRecord: True, table: "users", column: "email")
                            ->debounce(500)
                            ->validationMessages(['unique' => 'Este correo ya ha sido registrado']),
                        TextInput::make('password')
                            ->password()
                            ->required(),
                        
                        //View::make('filament.components.divider')
                         //   ->columnSpanFull(),
            
                        
                    ]),
            
                Section::make("Roles")
                    ->schema([
                        CheckboxList::make('roles')
                            ->relationship('roles', 'rol') // 'roles' es el nombre de la relación en el modelo User
                            ->searchable() // Opcional: si tienes muchos roles
                            ->columns(2) // Organiza los checks en 2 columnas
                            ->gridDirection('vertical'),
                    ])->columnStart(2)
            ]);
    }
}
