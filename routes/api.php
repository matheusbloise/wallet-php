<?php

use App\Http\Controllers\FinancialOperationWalletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopkeeperController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'customer'], function() {
    Route::get('', [CustomerController::class, 'index']);
    Route::get('{id}', [CustomerController::class, 'show']);
    Route::post('', [CustomerController::class, 'store']);
    Route::put('{id}', [CustomerController::class, 'update']);
    Route::delete('{id}', [CustomerController::class, 'destroy']);
});

Route::group(['prefix' => 'shopkeeper'], function() {
    Route::get('', [ShopkeeperController::class, 'index']);
    Route::get('{id}', [ShopkeeperController::class, 'show']);
    Route::post('', [ShopkeeperController::class, 'store']);
    Route::put('{id}', [ShopkeeperController::class, 'update']);
    Route::delete('{id}', [ShopkeeperController::class, 'destroy']);
});

Route::group(['prefix' => 'wallet'], function() {
    Route::post('/transfer', [FinancialOperationWalletController::class, 'transfer']);
});
