<?php

namespace Database\Factories;

use App\Models\Municipio;
use App\Models\Estado;
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
            'fecha' => fake()->date(),
            'estado_id' => Estado::factory(),
            'municipio_id' => Municipio::factory(),
            'parroquia_id' => fake()->randomNumber(),
            'status' => fake()->word(),
        ];
    }
}
