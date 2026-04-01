<?php

namespace App\Filament\Pages;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;

class Principal extends Page
{
    protected string $view = 'filament.pages.principal';


     use InteractsWithForms;

    // v4 Type: Must match parent (string|BackedEnum|null)
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-plus';


    // 1. Define el nombre del grupo (Categoría)
    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    
    public ?array $data = []; // 1. Propiedad de estado
}
