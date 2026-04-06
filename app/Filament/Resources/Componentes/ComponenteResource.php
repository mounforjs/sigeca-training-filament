<?php

namespace App\Filament\Resources\Componentes;

use App\Filament\Resources\Componentes\Pages\CreateComponente;
use App\Filament\Resources\Componentes\Pages\EditComponente;
use App\Filament\Resources\Componentes\Pages\ListComponentes;
use App\Filament\Resources\Componentes\Schemas\ComponenteForm;
use App\Filament\Resources\Componentes\Tables\ComponentesTable;
use App\Models\Componente;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ComponenteResource extends Resource
{
    protected static ?string $model = Componente::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'descripcion';

    public static function form(Schema $schema): Schema
    {
        return ComponenteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComponentesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListComponentes::route('/'),
            'create' => CreateComponente::route('/create'),
            'edit' => EditComponente::route('/{record}/edit'),
        ];
    }
}
