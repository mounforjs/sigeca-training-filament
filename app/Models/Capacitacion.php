<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Capacitacion extends Model
{
    use HasFactory;

    protected $table = "capacitaciones";

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'estado_id' => 'integer',
            'municipio_id' => 'integer',
            'parroquia_id' => 'integer',
            'fecha_inicio' => 'date',
            'fecha_final' => 'date',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "capacitaciones_users");
    }

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }

    public function parroquia(): BelongsTo
    {
        return $this->belongsTo(Parroquia::class);
    }

    public function componentes(): BelongsToMany
    {
        return $this->belongsToMany(Componente::class, "capacitaciones_componentes");
    }
}
