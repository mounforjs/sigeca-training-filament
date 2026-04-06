<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluacion extends Model
{
    /** @use HasFactory<\Database\Factories\EvaluacionFactory> */
    use HasFactory;

    protected $table = 'evaluaciones';

    public function nivelesFormacion() :BelongsToMany
    {
        return $this->belongsToMany(NivelFormacion::class, "evaluacion_nivel_formacion");
    }

    public function parametros() :HasMany
    {
        return $this->hasMany(ParametroEvaluacion::class);
    }
}
