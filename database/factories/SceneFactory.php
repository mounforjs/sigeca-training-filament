<?php

namespace Database\Factories;

use App\Models\Interaction;
use App\Models\Construction;
use Illuminate\Database\Eloquent\Factories\Factory;

class SceneFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'meaning' => fake()->word(),
            'description' => fake()->text(),
            'usage' => fake()->word(),
            'nanobanana' => fake()->word(),
            'grok' => fake()->word(),
            'construction_id' => Construction::factory(),
            'interaction_id' => Interaction::factory(),
        ];
    }
}
