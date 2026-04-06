<?php

namespace App\Filament\Resources\ParametroEvaluacions\Pages;

use App\Filament\Resources\ParametroEvaluacions\ParametroEvaluacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditParametroEvaluacion extends EditRecord
{
    protected static string $resource = ParametroEvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
