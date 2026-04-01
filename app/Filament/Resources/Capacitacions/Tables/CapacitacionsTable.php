<?php

namespace App\Filament\Resources\Capacitacions\Tables;

use App\Filament\Resources\Capacitacions\CapacitacionResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CapacitacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')
                    ->searchable(),
                TextColumn::make('fecha')
                    ->date()
                    ->sortable(),
                TextColumn::make('estado.id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('municipio.id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('parroquia_id')
                    ->numeric()
                    ->sortable(),
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
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('asistencia')
                ->label('Asistencia')
                ->icon('heroicon-o-check-badge')
                ->url(fn ($record) => CapacitacionResource::getUrl('registrar-asistencia', ['record' => $record])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
