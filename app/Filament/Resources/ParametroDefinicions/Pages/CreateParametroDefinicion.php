<?php

namespace App\Filament\Resources\ParametroDefinicions\Pages;

use App\Filament\Resources\ParametroDefinicions\ParametroDefinicionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateParametroDefinicion extends CreateRecord
{
    protected static string $resource = ParametroDefinicionResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Definicion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
