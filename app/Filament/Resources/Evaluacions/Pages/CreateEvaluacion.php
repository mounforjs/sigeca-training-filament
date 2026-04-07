<?php

namespace App\Filament\Resources\Evaluacions\Pages;

use App\Filament\Resources\Evaluacions\EvaluacionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateEvaluacion extends CreateRecord
{
    protected static string $resource = EvaluacionResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Evaluacion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
