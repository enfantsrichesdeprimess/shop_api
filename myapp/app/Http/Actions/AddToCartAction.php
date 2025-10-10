<?php

namespace App\Http\Actions;


use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddToCartAction
{
    public static function execute(AddToCartRequest $request)
    {
        $user = $request->user();
        $productId = $request->product_id;
        $quantity = $request->request->quantity ?? 1;

        $product = Product::findOrFail($productId);
        $cart = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();
        if ($cart) {
            $cart->quantity += $quantity;
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }
            return $product;
        }
    }
