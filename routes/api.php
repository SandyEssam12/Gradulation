<?php

use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Front\ProductController;
use App\Http\Controllers\Api\Front\FavouritesController;
use App\Http\Controllers\RecentController;
use App\Http\Controllers\WebsitesController;
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

Route::group(['middleware' => ['web']], function () {
    Route::get('/auth/google', [UserController::class, 'redireToGoogle']);
    Route::get('/auth/google-response', [UserController::class, 'handleGoogleCallback']);
});

Route::get('/auth/login', [UserController::class, 'login']);
Route::get('/auth/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/logout/{user}', [UserController::class, 'logout']);
    Route::get('/auth/update', [UserController::class, 'update']);

    Route::prefix('front')->namespace('Api\Front')->group(function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/{product}', [ProductController::class, 'show']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    });

    Route::prefix('front')->namespace('Api\Front')->group(function () {
        Route::get('/favourites', [FavouritesController::class, 'index']);
        Route::post('/favourites', [FavouritesController::class, 'store']);
        Route::get('/favourites/{favourite}', [FavouritesController::class, 'show']);
        Route::put('/favourites/{favourite}', [FavouritesController::class, 'update']);
        Route::delete('/favourites/{favourite}', [FavouritesController::class, 'destroy']);
    });
    

    Route::prefix('front')->namespace('Api\Front')->group(function () {
        Route::get('/recent', [RecentController::class, 'index']);
        Route::post('/recent', [RecentController::class, 'store']);
        Route::get('/recent/{recentProduct}', [RecentController::class, 'show']);
        Route::put('/recent/{recentProduct}', [RecentController::class, 'update']);
        Route::delete('/recent/{recentProduct}', [RecentController::class, 'destroy']);
    });
    
    

    Route::prefix('front')->namespace('Api\Front')->group(function () {
        Route::get('/websites', [WebsitesController::class, 'index']);
        Route::post('/websites', [WebsitesController::class, 'store']);
        Route::get('/websites/{website}', [WebsitesController::class, 'show']);
        Route::put('/websites/{website}', [WebsitesController::class, 'update']);
        Route::delete('/websites/{website}', [WebsitesController::class, 'destroy']);
    });
    

});
