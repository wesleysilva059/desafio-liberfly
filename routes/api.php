<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/** Auth Routes */
//TODO: removed throttle from route below, need to implement later properly
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('api')->group(function () {
    Route::post('/logout', [ AuthController::class, 'logout'])->name('logout');
    Route::post('/me', [ AuthController::class, 'me'])->name('me');
    Route::post('/refresh', [ AuthController::class, 'refresh'])->name('refresh');

    /**Products Routes */
    Route::prefix('products')->group(function () {
        Route::get('/', [ ProductController::class, 'list'])->name('product.list');
        Route::post('/store', [ ProductController::class, 'store' ])->name('product.store');
        Route::get('/show/{id}', [ ProductController::class, 'show'])->name('product.show');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});
