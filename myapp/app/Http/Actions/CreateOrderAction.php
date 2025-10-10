<?php

namespace App\Http\Actions;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreateOrderAction
{
    /**
     * Create a new class instance.
     */
    public static function execute(CreateOrderRequest $request): JsonResponse
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['order_number'] = Order::generateOrderNumber();
        $order = Order::create($data);
        return response()->json([
            'message' => 'ЗАКАЗ ОФОРМЛЕН ЖИЕСТЬ'
        ], 201);
    }
}
