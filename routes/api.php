<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;

Route::get('/user', static function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    'stores' => StoreController::class,
]);
Route::apiResources([
    'books' => BookController::class,
]);
