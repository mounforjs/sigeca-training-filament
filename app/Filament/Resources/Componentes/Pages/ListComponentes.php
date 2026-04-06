<?php

namespace App\Filament\Resources\Componentes\Pages;

use App\Filament\Resources\Componentes\ComponenteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComponentes extends ListRecords
{
    protected static string $resource = ComponenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
