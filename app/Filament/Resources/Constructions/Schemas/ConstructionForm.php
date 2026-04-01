<?php

namespace App\Filament\Resources\Constructions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ConstructionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label("title")
                    ->helperText("Title of the construction")
                    ->hintIcon('heroicon-o-rectangle-stack')
                    ->required(),
                TextInput::make('type')
                    ->required(),
            ]);
    }
}
