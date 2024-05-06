<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->unique()->randomElement([
                'media/ex1.php',
                'media/ex2.php',
                'media/ex3.php',
                'media/ex4.php',
                'media/ex5.php',
                'media/ex6.php',
                'media/ex7.php',
                'media/ex8.php',
                'media/ex9.php',
                'media/ex10.php',
                'media/ex11.php',
                'media/ex12.php',
            ]),
        ];
    }
}
