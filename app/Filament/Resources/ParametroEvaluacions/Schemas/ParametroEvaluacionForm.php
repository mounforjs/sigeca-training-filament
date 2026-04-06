<?php

namespace App\Filament\Resources\ParametroEvaluacions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParametroEvaluacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('descripcion')
                    ->required(),
                TextInput::make('evaluacion_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
