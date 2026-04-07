<?php

namespace App\Filament\Resources\Capacitacions\Pages;

use App\Filament\Resources\Capacitacions\CapacitacionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCapacitacion extends CreateRecord
{
    protected static string $resource = CapacitacionResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Capacitacion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
