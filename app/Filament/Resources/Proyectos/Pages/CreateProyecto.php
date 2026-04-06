<?php

namespace App\Filament\Resources\Proyectos\Pages;

use App\Filament\Resources\Proyectos\ProyectoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProyecto extends CreateRecord
{
    protected static string $resource = ProyectoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
