<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id'];

    // product belongs to a category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // product can have many images
    public function images() {
        return $this->hasMany(Image::class);
    }

    // product can have many reviews
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Product can be part of many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
