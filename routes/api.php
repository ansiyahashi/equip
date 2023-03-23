<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ItemController;
 



Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
});
Route::post('nearest_services', [ItemController::class, 'nearest_services']);
Route::post('service_providers', [ItemController::class, 'service_providers']);
Route::get('asset_details', [ItemController::class, 'item_details']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('service_provider_assets', [ItemController::class, 'service_provider_items']);
   
    Route::post('booking', [ItemController::class, 'booking']);
    Route::post('booking_details', [ItemController::class, 'booking_details']);
    Route::get('banners', [HomeController::class, 'banners']);
    Route::get('category', [HomeController::class, 'category']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'Registration']);
