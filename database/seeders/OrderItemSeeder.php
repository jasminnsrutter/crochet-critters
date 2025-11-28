<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OrderItem::insert([
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 25.00],
            ['order_id' => 1, 'product_id' => 3, 'quantity' => 1, 'price' => 30.00],
            ['order_id' => 2, 'product_id' => 2, 'quantity' => 1, 'price' => 75.00],
        ]);
    }
}
