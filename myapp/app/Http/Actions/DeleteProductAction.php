<?php

namespace App\Http\Actions;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class DeleteProductAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(Product $product)
    {
        return Product::query()->where('id', $product->product_id)->delete();
    }
}
