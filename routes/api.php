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
Route::middleware('extract.token')->group(function(){    
    Route::post('/posts', function(){
        return 'Post request handled.';
    });
    Route::put('/posts/{post}', function(){
        return 'Put request handled.';
    });
    Route::delete('/posts/{post}', function(){
        return 'Delete request handled';
    });
});