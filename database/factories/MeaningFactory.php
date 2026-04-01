<?php

namespace Database\Factories;

use App\Models\Construction;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeaningFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'construction_id' => Construction::factory(),
        ];
    }
}
