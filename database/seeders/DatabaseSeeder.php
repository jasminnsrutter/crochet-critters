<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, create users
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CustomOrderSeeder::class,
            OrderItemSeeder::class,
            ReviewSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
