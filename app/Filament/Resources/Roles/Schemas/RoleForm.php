<?php

namespace App\Filament\Resources\Roles\Schemas;

use Dom\Text;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Registro')
                    ->description('Datos del Rol')
                    ->schema([
                TextInput::make('rol')
                    ->required()
                    ->label('Nombre'),
                Textarea::make('description')
                    ->label('Descripcion'),
                ])
            ]);
    }
}
