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

            'thumb_image' => function() {
                 $images = ['menu2_img_1.jpg', 'menu2_img_4.jpg', 'menu2_img_5.jpg'];
                return 'web/images/'. fake()->randomElement($images);
            },
            'category_id' => function(){
                return Category::inRandomOrder()->first()->id;
            },
            'short_description' => fake()->paragraph(2),
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
