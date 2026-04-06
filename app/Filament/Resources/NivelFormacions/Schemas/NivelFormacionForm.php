<?php

namespace App\Filament\Resources\NivelFormacions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NivelFormacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('descripcion')
                    ->required(),
                DatePicker::make('fecha')
                    ->required(),
                TextInput::make('proyecto_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
