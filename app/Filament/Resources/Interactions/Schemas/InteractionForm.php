<?php

namespace App\Filament\Resources\Interactions\Schemas;

use App\Enums\InteractionType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InteractionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('type')
                    ->enum(InteractionType::class)
                    ->options(InteractionType::class)
            ]);
    }
}
