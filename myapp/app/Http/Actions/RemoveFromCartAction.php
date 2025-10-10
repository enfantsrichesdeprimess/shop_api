<?php

namespace App\Http\Actions;

use App\Models\Cart;
use App\Models\Product;
use http\Env\Request;

class RemoveFromCartAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(Cart $cart)
    {
        return Cart::query()->where('product_id', $cart->product_id)->delete();
    }
}
