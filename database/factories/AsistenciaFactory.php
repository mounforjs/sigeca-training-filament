<?php

namespace Database\Factories;

use App\Models\Capacitacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha' => fake()->date(),
            'asistio' => fake()->boolean(),
            'alumno_id' => fake()->randomNumber(),
            'capacitacion_id' => Capacitacion::factory(),
        ];
    }
}
