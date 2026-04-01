<?php

namespace App\Filament\Resources\Constructions;

use App\Filament\Resources\Constructions\Pages\CreateConstruction;
use App\Filament\Resources\Constructions\Pages\EditConstruction;
use App\Filament\Resources\Constructions\Pages\ListConstructions;
use App\Filament\Resources\Constructions\Schemas\ConstructionForm;
use App\Filament\Resources\Constructions\Tables\ConstructionsTable;
use App\Models\Construction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConstructionResource extends Resource
{
    protected static ?string $model = Construction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ConstructionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConstructionsTable::configure($table);
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
            'index' => ListConstructions::route('/'),
            'create' => CreateConstruction::route('/create'),
            'edit' => EditConstruction::route('/{record}/edit'),
        ];
    }
}
