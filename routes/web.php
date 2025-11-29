<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

// Home
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Custom Orders
|--------------------------------------------------------------------------
*/
Route::get('/custom-orders', [CustomOrderController::class, 'index']);
Route::post('/custom-orders', [CustomOrderController::class, 'store']);
Route::get('/custom-orders/{customOrder}', [CustomOrderController::class, 'show']);
Route::put('/custom-orders/{customOrder}', [CustomOrderController::class, 'update']);
Route::delete('/custom-orders/{customOrder}', [CustomOrderController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Order Items
|--------------------------------------------------------------------------
*/
Route::post('/order-items', [OrderItemController::class, 'store']);
Route::put('/order-items/{orderItem}', [OrderItemController::class, 'update']);
Route::delete('/order-items/{orderItem}', [OrderItemController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Images
|--------------------------------------------------------------------------
*/
Route::post('/images', [ImageController::class, 'store']);
Route::delete('/images/{image}', [ImageController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Users (optional)
|--------------------------------------------------------------------------
*/
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
