<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    public $fillable = [
      'user_id',
      'product_id',
      'order_number',
      'total',
      'cart_id',
      'number',
      'email',
      'address',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
        //kto prochitaet tot loh
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'order/' . date('Ymd') . '-' . strtoupper(Str::random(6));
    }
}
