<?php

namespace App\Filament\Resources\NivelFormacions;

use App\Filament\Resources\NivelFormacions\Pages\CreateNivelFormacion;
use App\Filament\Resources\NivelFormacions\Pages\EditNivelFormacion;
use App\Filament\Resources\NivelFormacions\Pages\ListNivelFormacions;
use App\Filament\Resources\NivelFormacions\Schemas\NivelFormacionForm;
use App\Filament\Resources\NivelFormacions\Tables\NivelFormacionsTable;
use App\Models\NivelFormacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NivelFormacionResource extends Resource
{
    protected static ?string $model = NivelFormacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'descripcion';

    public static function form(Schema $schema): Schema
    {
        return NivelFormacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NivelFormacionsTable::configure($table);
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
            'index' => ListNivelFormacions::route('/'),
            'create' => CreateNivelFormacion::route('/create'),
            'edit' => EditNivelFormacion::route('/{record}/edit'),
        ];
    }
}
