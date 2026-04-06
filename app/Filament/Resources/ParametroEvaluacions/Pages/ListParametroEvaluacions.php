<?php

namespace App\Filament\Resources\ParametroEvaluacions\Pages;

use App\Filament\Resources\ParametroEvaluacions\ParametroEvaluacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParametroEvaluacions extends ListRecords
{
    protected static string $resource = ParametroEvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
