<?php

namespace App\Filament\Resources\Evaluacions\Pages;

use App\Filament\Resources\Evaluacions\EvaluacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEvaluacions extends ListRecords
{
    protected static string $resource = EvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
