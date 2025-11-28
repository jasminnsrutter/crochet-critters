<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::insert([
            [
                'name' => 'Bunny Amigurumi',
                'description' => 'Cute handmade bunny toy',
                'price' => 25.00,
                'category_id' => 1
            ],
            [
                'name' => 'Crochet Blanket',
                'description' => 'Warm handmade blanket',
                'price' => 75.00,
                'category_id' => 2
            ],
            [
                'name' => 'Wool Scarf',
                'description' => 'Handmade wool scarf in various colors',
                'price' => 30.00,
                'category_id' => 3
            ],
            [
                'name' => 'Decorative Cushion',
                'description' => 'Crochet cushion for home decor',
                'price' => 40.00,
                'category_id' => 4
            ],
        ]);
    }
}
