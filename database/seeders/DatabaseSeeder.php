<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ImageFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(4)
            ->hasVariants(5)
            ->has(Image::Factory(3)->sequence(fn ($sequence) => ['featured' => $sequence->index % 3 === 0 ]))
            ->create();

        User::factory()
            ->hasUserAddress(3)
            ->create([
            'email' => 'test@test.com',
            'password' => bcrypt('test')
        ]);
    }
}
