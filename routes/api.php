<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ReportController;


// User authenticated check
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// PRODUCT ROUTES
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/category/{id}', [ProductController::class, 'filterByCategory']);
Route::get('/products/category/{id}', [ProductController::class, 'getByCategory']);
Route::get('/products/category/{category}', [ProductController::class, 'getByCategory']);

// API Resource Product
Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');

// OTHER API ROUTES

// Order resource
Route::apiResource('orders', OrderController::class)->middleware('auth:sanctum');

// Categories
Route::get('list-categories', [CategoryController::class, 'index'])->middleware('auth:sanctum');

// Reports
Route::get('/reports/summary', [ReportController::class, 'summary'])->middleware('auth:sanctum');
Route::get('/reports/product-sales', [ReportController::class, 'productSales'])->middleware('auth:sanctum');
Route::get('/reports/close-cashier', [ReportController::class, 'closeCashier'])->middleware('auth:sanctum');
