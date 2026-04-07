<?php

namespace App\Filament\Resources\ParametroEvaluacions\Pages;

use App\Filament\Resources\ParametroEvaluacions\ParametroEvaluacionResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateParametroEvaluacion extends CreateRecord
{
    protected static string $resource = ParametroEvaluacionResource::class;

    public function getTitle(): string | Htmlable
    {
        return "Evaluacion";
    }


    public function getBreadcrumbs(): array
    {
        return [];
    }
}
