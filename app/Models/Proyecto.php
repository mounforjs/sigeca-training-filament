<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    /** @use HasFactory<\Database\Factories\ProyectoFactory> */
    use HasFactory;

    public function nivelesFormacion(): HasMany
    {
        return $this->hasMany(NivelFormacion::class);
    }

    public function capacitaciones(): HasMany
    {
        return $this->hasMany(Capacitacion::class);
    }

}
