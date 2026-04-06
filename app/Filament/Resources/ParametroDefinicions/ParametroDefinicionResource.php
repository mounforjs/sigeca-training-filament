<?php

namespace App\Filament\Resources\ParametroDefinicions;

use App\Filament\Resources\ParametroDefinicions\Pages\CreateParametroDefinicion;
use App\Filament\Resources\ParametroDefinicions\Pages\EditParametroDefinicion;
use App\Filament\Resources\ParametroDefinicions\Pages\ListParametroDefinicions;
use App\Filament\Resources\ParametroDefinicions\Schemas\ParametroDefinicionForm;
use App\Filament\Resources\ParametroDefinicions\Tables\ParametroDefinicionsTable;
use App\Models\ParametroDefinicion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParametroDefinicionResource extends Resource
{
    protected static ?string $model = ParametroDefinicion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'definicion';

    public static function form(Schema $schema): Schema
    {
        return ParametroDefinicionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParametroDefinicionsTable::configure($table);
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
            'index' => ListParametroDefinicions::route('/'),
            'create' => CreateParametroDefinicion::route('/create'),
            'edit' => EditParametroDefinicion::route('/{record}/edit'),
        ];
    }
}
