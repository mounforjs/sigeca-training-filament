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

                
            ]);
    }
}
