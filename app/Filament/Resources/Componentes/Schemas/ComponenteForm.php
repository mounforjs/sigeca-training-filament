<?php

namespace App\Filament\Resources\Componentes\Schemas;

use App\Models\NivelFormacion;
use App\Models\Proyecto;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class ComponenteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('descripcion')
                    ->required(),
                TextInput::make('horas')
                    ->required()
                    ->numeric(),
                Select::make('proyecto_id')
                    ->options(function () {
                        return Proyecto::all()->pluck('titulo', "id");
                    })
                    ->label("Proyecto")
                    ->live()
                    ->dehydrated(false)
                    ->preload(),
                Select::make('nivel_formacion_id')
                    ->label('Nivel de Formacion')
                    ->options(function(Get $get) {
                        return NivelFormacion::where('proyecto_id', $get('proyecto_id'))
                                ->orderBy('id', 'asc')
                                ->pluck('descripcion', 'id')
                                ->toArray();
                    })
                    ->preload(),
                
            ]);
    }
}
