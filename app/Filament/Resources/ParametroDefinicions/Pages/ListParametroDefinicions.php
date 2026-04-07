<?php

namespace App\Filament\Resources\ParametroDefinicions\Pages;

use App\Filament\Resources\ParametroDefinicions\ParametroDefinicionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListParametroDefinicions extends ListRecords
{
    protected static string $resource = ParametroDefinicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Definiciones";
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
