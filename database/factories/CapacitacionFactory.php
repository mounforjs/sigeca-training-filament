<?php

namespace Database\Factories;

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapacitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

        return [
            'titulo' => fake()->word(),
            'descripcion' => fake()->text(),
            'estado_id' => null,
            'municipio_id' => null,
            'parroquia_id' => null,
            'fecha_inicio' => fake()->date(),
            'fecha_final' => fake()->date(),
            'status' => fake()->word(),
        ];
    }
}
