<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'thumb_image' => 'test/image.png',
            'category_id' => function(){
                return Category::inRandomOrder()->first()->id;
            },
            'short_description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 200),
            'offer_price' => fake()->randomFloat(2, 1, 100),
            'sku' => fake()->unique()->ean13(),
            'show_at_home' => fake()->boolean(),
            'seo_title' => fake()->paragraph(),
            'seo_description' => fake()->paragraph(),
            'status' => fake()->boolean(),
        ];
    }
}
