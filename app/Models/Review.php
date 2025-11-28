<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'rating', 'comment'];

    // review belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // review belongs to a product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
