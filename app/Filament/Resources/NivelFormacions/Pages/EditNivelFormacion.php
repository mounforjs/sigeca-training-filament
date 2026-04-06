<?php

namespace App\Filament\Resources\NivelFormacions\Pages;

use App\Filament\Resources\NivelFormacions\NivelFormacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNivelFormacion extends EditRecord
{
    protected static string $resource = NivelFormacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
