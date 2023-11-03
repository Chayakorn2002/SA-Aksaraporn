<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'product_image' => 'default-image.jpg', // You can replace with actual image names or a random image generator.
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'product_minimum_quantity' => $this->faker->numberBetween(10, 50), // This assumes you have a minimum quantity of 1.
            'category_id' => Category::inRandomOrder()->first()->id, // This assumes you have a Category model with a relationship to products.
        ];
    }

    /**
     * Define a state to set product_stock greater than product_minimum_quantity.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function stockGreaterThanOrEqualToMinimum()
    {
        return $this->state(function (array $attributes) {
            return [
                'product_stock' => $attributes['product_minimum_quantity'] + $this->faker->numberBetween(1, 50), // Adjust the range as needed
            ];
        });
    }
}
