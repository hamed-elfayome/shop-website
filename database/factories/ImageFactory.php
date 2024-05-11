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
                'media/ex1.png',
                'media/ex2.png',
                'media/ex3.png',
                'media/ex4.png',
                'media/ex5.png',
                'media/ex6.png',
                'media/ex7.png',
                'media/ex8.png',
                'media/ex9.png',
                'media/ex10.png',
                'media/ex11.png',
                'media/ex12.png',
            ]),
        ];
    }
}
