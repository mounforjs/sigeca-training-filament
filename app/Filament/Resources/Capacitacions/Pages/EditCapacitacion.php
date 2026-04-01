<?php

namespace App\Filament\Resources\Capacitacions\Pages;

use App\Filament\Resources\Capacitacions\CapacitacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCapacitacion extends EditRecord
{
    protected static string $resource = CapacitacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
