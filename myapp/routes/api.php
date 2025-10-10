<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\OrdersController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/products/', [ProductController::class, 'index'])->middleware('throttle:api');
Route::get('v1/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('v1/profile', [ProfileController::class, 'index'])->middleware('auth:sanctum');
Route::get('v1/products/{product}', [ProductController::class, 'detailedIndex']);
Route::post('v1/orders/checkout', [OrdersController::class, 'create'])->middleware('auth:sanctum');


Route::prefix('v1')->middleware(['throttle:api'])->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::prefix('v1')->middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::post('cart/add', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'index']);
    Route::delete('cart/remove', [CartController::class, 'update']);
    Route::patch('profile/update', [ProfileController::class, 'update']);
    Route::post('products/create', [ProductController::class, 'store']);
    Route::patch('products/{product}/update', [ProductController::class, 'update']);
    Route::delete('products/delete', [ProductController::class, 'destroy']);
});
