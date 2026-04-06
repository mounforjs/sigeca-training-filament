<?php

namespace App\Filament\Resources\ParametroDefinicions\Schemas;

use App\Models\ParametroEvaluacion;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ParametroDefinicionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make("Datos")
                ->schema([
                    Select::make('parametro.nombre')
                        ->required()
                        ->options(function() {
                            return ParametroEvaluacion::query()
                            ->with('evaluacion')
                            ->orderBy('id', 'asc')
                            ->get()
                            ->mapWithKeys( function($item) {
                                $descripcionEvaluacion = $item->evaluacion?->descripcion ?? 'Sin descripcion';
                                return [ $item->id => "$item->id | $descripcionEvaluacion | $item->nombre" ];
                            });
                        })
                        ->preload(),
                    TextInput::make('definicion')
                        ->required(),
                    TextInput::make('puntuacion')
                        ->required()
                        ->numeric(),
                ])
                
            ]);
    }
}
