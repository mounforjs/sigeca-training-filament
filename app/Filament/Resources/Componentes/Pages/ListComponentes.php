<?php

namespace App\Filament\Resources\Componentes\Pages;

use App\Filament\Resources\Componentes\ComponenteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListComponentes extends ListRecords
{
    protected static string $resource = ComponenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Componentes";
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
