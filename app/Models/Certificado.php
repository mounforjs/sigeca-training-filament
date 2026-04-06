<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificado extends Model
{
    /** @use HasFactory<\Database\Factories\CertificadoFactory> */
    use HasFactory;


    public function nivelFormacion() : BelongsTo
    {
        return $this->belongsTo(NivelFormacion::class);
    }
}
