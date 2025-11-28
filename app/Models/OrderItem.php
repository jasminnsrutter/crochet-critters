<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // OrderItem belongs to a custom order
    public function order() {
        return $this->belongsTo(CustomOrder::class);
    }

    // OrderItem belongs to a product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
