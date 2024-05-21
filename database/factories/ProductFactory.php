<?php

namespace Database\Factories;

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
            'name' => fake()->name,
            'description' => fake()->text,
            'price' => fake()->randomFloat(2, 500, 2000),
            'image' => fake()->randomElement(['product_1.webp','product_2.webp']),
            'heart' => fake()->numberBetween(0,2147483647),
            'hot' => fake()->numberBetween(0,1),
            'view' => fake()->numberBetween(0,10000),
            'hidden' => fake()->numberBetween(0,1),
        ];
    }
}
