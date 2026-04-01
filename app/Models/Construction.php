<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Construction extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }

    public function meanings(): HasMany
    {
        return $this->hasMany(Meaning::class);
    }

    public function scenes(): HasMany
    {
        return $this->hasMany(Scene::class);
    }
}
