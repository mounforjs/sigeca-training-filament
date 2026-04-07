<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NivelFormacion extends Model
{
    /** @use HasFactory<\Database\Factories\NivelFormacionFactory> */
    use HasFactory;

    protected $table ='niveles_formacion';


    public function proyecto() : BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function evaluaciones() :BelongsToMany
    {
        return $this->belongsToMany(Evaluacion::class, "evaluacion_nivel_formacion");
    }

    public function capacitaciones(): HasMany
    {
        return $this->hasMany(Capacitacion::class);
    }


}
