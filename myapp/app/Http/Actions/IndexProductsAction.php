<?php

namespace App\Http\Actions;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class IndexProductsAction
{
    /**
     * Create a new class instance.
     */
    public static function execute()
    {
        return ProductResource::collection(Product::all());
    }
}
