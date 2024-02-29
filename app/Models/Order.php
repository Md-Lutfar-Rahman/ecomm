<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cart_id',
        'quantity',
        'product_id',
        'order_date',
        'order_status',
        'total_amount',
        'payment_status',
        'shipping_address',
        'billing_address',
        'shipping_method',
        'payment_method',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
