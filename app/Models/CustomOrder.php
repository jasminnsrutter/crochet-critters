<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    /** @use HasFactory<\Database\Factories\CustomOrderFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total_price'];

    // custom order belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // custom order has many order items
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
