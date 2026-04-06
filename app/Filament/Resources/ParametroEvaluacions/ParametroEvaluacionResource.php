<?php

namespace App\Filament\Resources\ParametroEvaluacions;

use App\Filament\Resources\ParametroEvaluacions\Pages\CreateParametroEvaluacion;
use App\Filament\Resources\ParametroEvaluacions\Pages\EditParametroEvaluacion;
use App\Filament\Resources\ParametroEvaluacions\Pages\ListParametroEvaluacions;
use App\Filament\Resources\ParametroEvaluacions\Schemas\ParametroEvaluacionForm;
use App\Filament\Resources\ParametroEvaluacions\Tables\ParametroEvaluacionsTable;
use App\Models\ParametroEvaluacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParametroEvaluacionResource extends Resource
{
    protected static ?string $model = ParametroEvaluacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return ParametroEvaluacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParametroEvaluacionsTable::configure($table);
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
            'index' => ListParametroEvaluacions::route('/'),
            'create' => CreateParametroEvaluacion::route('/create'),
            'edit' => EditParametroEvaluacion::route('/{record}/edit'),
        ];
    }
}
