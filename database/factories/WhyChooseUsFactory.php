<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WhyChooseUs>
 */
class WhyChooseUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => 'fas fa-percent',
            'title' => fake()->sentence(),
            'shot_description' => fake()->sentence(),
            'status' => fake()->boolean(),
        ];
    }
}
