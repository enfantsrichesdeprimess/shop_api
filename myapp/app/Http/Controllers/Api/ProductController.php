<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\DeleteProductAction;
use App\Http\Actions\CreateProductAction;
use App\Http\Actions\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Actions\IndexProductsAction;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(IndexProductsAction::execute());
    }

    public function detailedIndex(Product $product): JsonResponse
    {
        return response()->json($product);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = CreateProductAction::execute($request);
        return response()->json([
            $product,
            'message' => 'Product created successfully.'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = UpdateProductAction::execute($request, $product);
        return response()->json([
            $product,
            'message' => 'Продукт успешно обновлен'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DeleteProductAction::execute($product);
        return response()->json([
            'message' => 'Товар удален'
            ]);
    }
}



