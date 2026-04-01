<?php

namespace Database\Factories;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipioFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_municipio' => fake()->word(),
            'estado_id' => Estado::factory(),
            'municipio_id' => fake()->randomNumber(),
        ];
    }
}
