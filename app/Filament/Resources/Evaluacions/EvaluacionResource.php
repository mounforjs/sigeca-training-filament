<?php

namespace App\Filament\Resources\Evaluacions;

use App\Filament\Resources\Evaluacions\Pages\CreateEvaluacion;
use App\Filament\Resources\Evaluacions\Pages\EditEvaluacion;
use App\Filament\Resources\Evaluacions\Pages\ListEvaluacions;
use App\Filament\Resources\Evaluacions\Schemas\EvaluacionForm;
use App\Filament\Resources\Evaluacions\Tables\EvaluacionsTable;
use App\Models\Evaluacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EvaluacionResource extends Resource
{
    protected static ?string $model = Evaluacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'descripcion';

    public static function form(Schema $schema): Schema
    {
        return EvaluacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EvaluacionsTable::configure($table);
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
            'index' => ListEvaluacions::route('/'),
            'create' => CreateEvaluacion::route('/create'),
            'edit' => EditEvaluacion::route('/{record}/edit'),
        ];
    }
}
