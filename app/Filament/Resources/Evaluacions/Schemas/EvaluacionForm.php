<?php

namespace App\Filament\Resources\Evaluacions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EvaluacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('descripcion')
                    ->required(),
                TextInput::make('nombre_corto'),
            ]);
    }
}
