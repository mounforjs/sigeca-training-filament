<?php

namespace App\Filament\Resources\Evaluacions\Pages;

use App\Filament\Resources\Evaluacions\EvaluacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEvaluacion extends EditRecord
{
    protected static string $resource = EvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
