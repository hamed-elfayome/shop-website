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
            'name' => $this->faker->unique()->randomElement(['Cap', 'T-shirt', 'shoes', 'short']),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(5_00, 100_00),

        ];
    }
}
