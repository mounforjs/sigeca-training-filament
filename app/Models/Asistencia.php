<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asistencia extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'fecha' => 'date',
            'asistio' => 'boolean',
            'alumno_id' => 'integer',
            'capacitacion_id' => 'integer',
        ];
    }

    public function capacitacion(): BelongsTo
    {
        return $this->belongsTo(Capacitacion::class);
    }
}
