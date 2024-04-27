<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\ProductAccessMiddleware;
use GuzzleHttp\Handler\Proxy;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route using apiResource
Route::apiResource('products', ProductController::class);

// Two Additional Routes for Uploading Images

// Local
Route::post('/products/upload/local', [ProductController::class,
'uploadImageLocal']);

// Public
Route::post('/products/upload/public', [ProductController::class,
'uploadImagePublic']);


// Middleware
Route::post('/post', function () {
    return response()->json(['message' => 'POST request handled.']);
})->middleware(ProductAccessMiddleware::class);

Route::put('/put', function () {
    return response()->json(['message' => 'PUT request handled.']);
})->middleware(ProductAccessMiddleware::class);

Route::delete('/delete', function () {
    return response()->json(['message' => 'Delete request handled.']);
})->middleware(ProductAccessMiddleware::class);
