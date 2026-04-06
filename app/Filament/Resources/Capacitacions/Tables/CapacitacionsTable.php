<?php

namespace App\Filament\Resources\Capacitacions\Tables;

use App\Filament\Pages\ReporteCustom;
use App\Filament\Resources\Capacitacions\CapacitacionResource;
use App\Models\Capacitacion;
use App\Models\Municipio;
use App\Models\Parroquia;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CapacitacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id"),
                TextColumn::make('titulo')
                    ->searchable(),
                TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                TextColumn::make('fecha_final')
                    ->date()
                    ->sortable(),
                TextColumn::make('estado.nombre_estado')
                    ->sortable(),
                TextColumn::make('municipio_id')
                    ->label('Municipio')
                    ->sortable()
                    ->formatStateUsing(function ($municipio, $record, $livewire) {
                       
                        $municipio = Municipio::where('municipio_id', $record->municipio_id)
                            ->where('estado_id', $record->estado_id)
                            ->first();

                        return $municipio?->nombre_municipio ?? 'N/A';
                    }),
                TextColumn::make('parroquia_id')
                    ->label('Parroquia')
                    ->sortable()
                    ->formatStateUsing(function ($parroquia, $record, $livewire) {
                        
                        $parroquia = Parroquia::where('parroquia_id', $record->parroquia_id)
                            ->where('municipio_id', $record->municipio_id)
                            ->where('estado_id', $record->estado_id)
                            ->first();

                        return $parroquia?->nombre_parroquia ?? 'N/A';
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                
                    
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('asistencia')
                ->label('Asistencia')
                ->icon('heroicon-o-check-badge')
                ->url(fn ($record) => CapacitacionResource::getUrl('registrar-asistencia', ['record' => $record])),

                Action::make('matricula')
                ->label('Matricula')
                ->icon('heroicon-o-check-badge')
                ->url(fn ($record) => ReporteCustom::getUrl(['record' => $record]))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
