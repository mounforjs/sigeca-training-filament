<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meaning extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'construction_id' => 'integer',
        ];
    }

    public function construction(): BelongsTo
    {
        return $this->belongsTo(Construction::class);
    }
}
