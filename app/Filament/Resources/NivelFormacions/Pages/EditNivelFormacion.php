<?php

namespace App\Filament\Resources\NivelFormacions\Pages;

use App\Filament\Resources\NivelFormacions\NivelFormacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditNivelFormacion extends EditRecord
{
    protected static string $resource = NivelFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Nivel de Formacion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
