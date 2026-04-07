<?php

namespace App\Filament\Resources\NivelFormacions\Pages;

use App\Filament\Resources\NivelFormacions\NivelFormacionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateNivelFormacion extends CreateRecord
{
    protected static string $resource = NivelFormacionResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Nivel de Formacion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
