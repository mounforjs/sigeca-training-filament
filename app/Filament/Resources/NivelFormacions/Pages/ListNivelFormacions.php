<?php

namespace App\Filament\Resources\NivelFormacions\Pages;

use App\Filament\Resources\NivelFormacions\NivelFormacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNivelFormacions extends ListRecords
{
    protected static string $resource = NivelFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
