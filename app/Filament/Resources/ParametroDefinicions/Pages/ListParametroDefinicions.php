<?php

namespace App\Filament\Resources\ParametroDefinicions\Pages;

use App\Filament\Resources\ParametroDefinicions\ParametroDefinicionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParametroDefinicions extends ListRecords
{
    protected static string $resource = ParametroDefinicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
