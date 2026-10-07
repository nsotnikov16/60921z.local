<?php

use App\Http\Controllers\AdvertisementControllerApi;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\CityControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/categories', [CategoryControllerApi::class, 'index']);
Route::get('/categories/{id}', [CategoryControllerApi::class, 'show']);
Route::get('/categories_total', [CategoryControllerApi::class, 'total']);
Route::get('/advertisements', [AdvertisementControllerApi::class, 'index']);
Route::get('/advertisements/{id}', [AdvertisementControllerApi::class, 'show']);
Route::get('/advertisements_total', [AdvertisementControllerApi::class, 'total']);
Route::get('/cities', [CityControllerApi::class, 'index']);
Route::get('/cities/{id}', [CityControllerApi::class, 'show']);
