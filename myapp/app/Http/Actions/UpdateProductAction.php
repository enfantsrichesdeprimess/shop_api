<?php

namespace App\Http\Actions;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UpdateProductAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return $product;
    }
}
