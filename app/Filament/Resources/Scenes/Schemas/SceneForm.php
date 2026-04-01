<?php

namespace App\Filament\Resources\Scenes\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SceneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('meaning')
                    ->required(),
                RichEditor::make('description')
                    ->required()
                    //->toolbarButtons(['h2', 'bold'])
                    ->maxLength(255),
                TextInput::make('usage')
                    ->required(),
                TextInput::make('nanobanana')
                    ->required(),
                TextInput::make('grok')
                    ->required(),
                Select::make('construction_id')
                    ->relationship('construction', 'title')
                    ->required(),
                Select::make('interaction_id')
                    ->relationship('interaction', 'title')
                    ->required(),
            ]);
    }
}
