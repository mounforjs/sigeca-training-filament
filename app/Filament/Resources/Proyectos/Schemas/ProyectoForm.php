<?php

namespace App\Filament\Resources\Proyectos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProyectoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Datos")
                    ->schema([
                    TextInput::make('titulo')
                        ->required(),
                    TextInput::make('descripcion')
                        ->required(),
                    DatePicker::make('fecha')
                        ->required(),

                ])
            ]);
    }
}
