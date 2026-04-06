<?php

namespace App\Filament\Resources\Capacitacions;

use App\Filament\Pages\ReporteCustom;
use App\Filament\Resources\Capacitacions\Pages\CreateCapacitacion;
use App\Filament\Resources\Capacitacions\Pages\EditCapacitacion;
use App\Filament\Resources\Capacitacions\Pages\ListCapacitacions;
use App\Filament\Resources\Capacitacions\Schemas\CapacitacionForm;
use App\Filament\Resources\Capacitacions\Tables\CapacitacionsTable;
use App\Models\Capacitacion;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Filament\Resources\CapacitacionResource\Pages\RegistrarAsistencia;

class CapacitacionResource extends Resource
{
    protected static ?string $model = Capacitacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CapacitacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CapacitacionsTable::configure($table);
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
            'index' => ListCapacitacions::route('/'),
            'create' => CreateCapacitacion::route('/create'),
            'edit' => EditCapacitacion::route('/{record}/edit'),
            'registrar-asistencia' => RegistrarAsistencia::route('/{record}/asistencia'),
            'matricula' => ReporteCustom::route('/matricula/{record}'),
        ];
    }

    public static function getActions(): array
    {
        return [
            
        ];
    }
}
