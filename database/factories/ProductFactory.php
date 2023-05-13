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
            'sku' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->words(3, true),
            'category' => $this->faker->randomElement(['boots', 'sandals', 'sneakers']),
            'price' => $this->faker->numberBetween(50000, 100000),
        ];
    }
}
