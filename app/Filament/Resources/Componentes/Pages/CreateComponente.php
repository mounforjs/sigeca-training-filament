<?php

namespace App\Filament\Resources\Componentes\Pages;

use App\Filament\Resources\Componentes\ComponenteResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateComponente extends CreateRecord
{
    protected static string $resource = ComponenteResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Componente";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
