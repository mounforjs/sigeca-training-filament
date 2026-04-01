<?php

namespace App\Filament\Resources\Capacitacions\Pages;

use App\Filament\Resources\Capacitacions\CapacitacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCapacitacions extends ListRecords
{
    protected static string $resource = CapacitacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
