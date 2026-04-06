<?php

namespace App\Filament\Resources\ParametroDefinicions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParametroDefinicionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('definicion')
                    ->required(),
                TextInput::make('puntuacion')
                    ->required()
                    ->numeric(),
                TextInput::make('parametro_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
