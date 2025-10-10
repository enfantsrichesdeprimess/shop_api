<?php

namespace App\Http\Actions;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateProductAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(StoreProductRequest $request)
    {
        return Product::create($request->all());
    }
}
