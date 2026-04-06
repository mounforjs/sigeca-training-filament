<?php

namespace App\Filament\Resources\NivelFormacions\Schemas;

use App\Models\Proyecto;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NivelFormacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Datos Nivel de Formacion')
                    ->schema([
                        Select::make('proyecto_id')
                            ->label("Proyecto")
                            ->options(function () {
                                return Proyecto::query()
                                    ->orderBy('id', 'asc')
                                    ->get()
                                    ->mapWithKeys( function($item) {
                                        return [ $item->id => "$item->id | $item->titulo"];
                                    });
                            }), 
                        TextInput::make('descripcion')
                            ->required(),
                        DatePicker::make('fecha')
                            ->required(),
                
                ])
                
            ]);
    }
}
