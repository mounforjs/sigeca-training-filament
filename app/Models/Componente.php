<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Componente extends Model
{
    /** @use HasFactory<\Database\Factories\ComponenteFactory> */
    use HasFactory;

    public function nivelFormacion() :BelongsTo
    {
        return $this->belongsTo(NivelFormacion::class);
    }

    public function componentes(): BelongsToMany
    {
        return $this->belongsToMany(Componente::class, "capacitaciones_componentes");
    }
}
