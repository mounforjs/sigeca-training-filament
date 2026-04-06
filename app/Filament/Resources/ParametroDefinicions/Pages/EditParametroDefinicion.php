<?php

namespace App\Filament\Resources\ParametroDefinicions\Pages;

use App\Filament\Resources\ParametroDefinicions\ParametroDefinicionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditParametroDefinicion extends EditRecord
{
    protected static string $resource = ParametroDefinicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
