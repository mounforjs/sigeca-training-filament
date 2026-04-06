<?php

namespace App\Filament\Resources\Componentes\Pages;

use App\Filament\Resources\Componentes\ComponenteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditComponente extends EditRecord
{
    protected static string $resource = ComponenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
