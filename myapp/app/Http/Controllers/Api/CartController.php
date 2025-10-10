<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\AddToCartAction;
use App\Http\Actions\IndexProductsAction;
use App\Http\Actions\RemoveFromCartAction;
use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Actions\IndexCartAction;

class CartController extends Controller
{
    public function addToCart(AddToCartRequest $request): JsonResponse
    {
        $product = AddToCartAction::execute($request);
        return response()->json([
            'message' => 'Товар добавлен в корзину',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ]
        ], 201);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        IndexCartAction::execute();
        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart , Product $product)
    {
        RemoveFromCartAction::execute($cart);
        return response()->json([
            'message' => 'Товар удален из корзины'
        ]);
    }
}
