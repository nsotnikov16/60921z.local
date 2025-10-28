<?php

use App\Http\Controllers\AdvertisementControllerApi;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\CityControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryControllerApi::class, 'index']);
Route::get('/categories/{id}', [CategoryControllerApi::class, 'show']);
Route::get('/advertisements', [AdvertisementControllerApi::class, 'index']);
Route::get('/advertisements/{id}', [AdvertisementControllerApi::class, 'show']);
Route::get('/cities', [CityControllerApi::class, 'index']);
Route::get('/cities/{id}', [CityControllerApi::class, 'show']);
