<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            ['name' => 'Amigurumi', 'description' => 'Handmade stuffed toys'],
            ['name' => 'Blankets', 'description' => 'Crochet blankets and throws'],
            ['name' => 'Accessories', 'description' => 'Hats, scarves, and more'],
            ['name' => 'Home Decor', 'description' => 'Cushions, rugs, and decorations'],
        ]);
    }
}
