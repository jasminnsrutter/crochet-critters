<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CustomOrder;

class CustomOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CustomOrder::insert([
            ['details' => 'Custom amigurumi unicorn', 'status' => 'pending', 'user_id' => 1, 'total_price' => 25.00],
            ['details' => 'Extra large crochet blanket', 'status' => 'completed', 'user_id' => 1, 'total_price' => 80.00],
        ]);

    }
}
