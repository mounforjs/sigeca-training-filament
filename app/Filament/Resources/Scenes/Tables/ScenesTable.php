<?php

namespace App\Filament\Resources\Scenes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScenesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('meaning')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('usage')
                    ->searchable(),
                TextColumn::make('nanobanana')
                    ->searchable(),
                TextColumn::make('grok')
                    ->searchable(),
                TextColumn::make('construction.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('interaction.title')
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
