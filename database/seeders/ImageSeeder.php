<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Image::insert([
            ['product_id' => 1, 'url' => 'images/bunny.jpg'],
            ['product_id' => 2, 'url' => 'images/blanket.jpg'],
            ['product_id' => 3, 'url' => 'images/scarf.jpg'],
            ['product_id' => 4, 'url' => 'images/cushion.jpg'],
        ]);
    }
}
