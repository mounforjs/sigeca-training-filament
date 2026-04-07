<?php

namespace App\Filament\Resources\Evaluacions\Pages;

use App\Filament\Resources\Evaluacions\EvaluacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListEvaluacions extends ListRecords
{
    protected static string $resource = EvaluacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        return "Evaluaciones";
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
