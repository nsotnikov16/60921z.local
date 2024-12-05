<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::resource('categories', CategoryController::class);
Route::resource('advertisements', AdvertisementController::class);
