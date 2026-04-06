<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParametroEvaluacion extends Model
{
    /** @use HasFactory<\Database\Factories\ParametroEvaluacionFactory> */
    use HasFactory;

    protected $table = 'parametro_evaluaciones';

    public function evaluacion(): BelongsTo
    {
        return $this->belongsTo(Evaluacion::class);
    }

    public function definiciones() : HasMany
    {
        return $this->hasMany(ParametroDefinicion::class);
    }
}
