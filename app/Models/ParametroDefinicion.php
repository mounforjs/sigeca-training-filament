<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParametroDefinicion extends Model
{
    /** @use HasFactory<\Database\Factories\ParametroDefinicionFactory> */
    use HasFactory;

    protected $table = 'parametro_definiciones';

    public function parametro() : BelongsTo
    {
        return $this->belongsTo(ParametroEvaluacion::class);
    }
}
