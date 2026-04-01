<?php

namespace Database\Factories;

use App\Models\;
use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParroquiaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_parroquia' => fake()->word(),
            'estado_id' => Estado::factory(),
            'municipio_id' => ::factory(),
            'parroquia_id' => fake()->randomNumber(),
        ];
    }
}
