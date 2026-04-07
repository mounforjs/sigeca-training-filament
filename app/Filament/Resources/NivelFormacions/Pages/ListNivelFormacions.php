<?php

namespace App\Filament\Resources\NivelFormacions\Pages;

use App\Filament\Resources\NivelFormacions\NivelFormacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListNivelFormacions extends ListRecords
{
    protected static string $resource = NivelFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Niveles de Formacion";
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
