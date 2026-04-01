<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InteractionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'type' => fake()->word(),
        ];
    }
}
