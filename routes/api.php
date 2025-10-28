<?php

use App\Http\Controllers\AdvertisementControllerApi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\CityControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/categories', [CategoryControllerApi::class, 'index']);
    Route::get('/categories/{id}', [CategoryControllerApi::class, 'show']);
    Route::get('/advertisements', [AdvertisementControllerApi::class, 'index']);
    Route::get('/advertisements/{id}', [AdvertisementControllerApi::class, 'show']);
    Route::get('/cities', [CityControllerApi::class, 'index']);
    Route::get('/cities/{id}', [CityControllerApi::class, 'show']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
