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
            'product_name' => fake()->word,
            'product_description' => fake()->sentence,
            'product_image' => 'default-image.jpg', // You can replace with actual image names or a random image generator.
            'product_price' => fake()->randomFloat(2, 10, 1000),
            'product_stock' => fake()->numberBetween(0, 100),
            'category_id' => Category::inRandomOrder()->first()->id, // This assumes you have a Category model with a relationship to products.
        ];
    }
}
