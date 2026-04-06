<?php

namespace App\Filament\Resources\ParametroEvaluacions\Schemas;

use App\Models\Evaluacion;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ParametroEvaluacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                    Section::make("Datos")
                        ->schema([
                            Select::make("evaluacion_id")
                                ->label("Evaluacion")
                                ->options(function() {
                                    return Evaluacion::query()
                                        ->orderBy('id', 'asc')
                                        ->get()
                                        ->mapWithKeys(function ($item) {
                                            return [ $item->id => "$item->id | $item->descripcion" ];
                                        });
                                }),
                            TextInput::make('nombre')
                                ->required(),
                            TextInput::make('descripcion')
                                ->required(),
                    
                    ])

                ]);
    }
}
