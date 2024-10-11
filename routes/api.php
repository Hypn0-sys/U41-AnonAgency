<?php

use App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fl/ag', [API::class, 'index']);


Route::get('/fl/ag/{id}', [API::class, 'hardOne']);
