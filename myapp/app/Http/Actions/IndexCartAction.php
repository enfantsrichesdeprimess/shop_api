<?php

namespace App\Http\Actions;

use App\Models\Cart;

class IndexCartAction
{
    public static function execute()
    {
       return Cart::all();
    }
}
