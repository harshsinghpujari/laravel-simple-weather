<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RainController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return ["message" => 'Api is working!'];
});

//remember get takes two parameters  one url and other is an array which contains class and function name in string
Route::get('/weather/{city}', [RainController::class, 'makeRain']);

Route::get('/vip-lounge', function() {
    return [
        'status' => 200,
        'message' => '🥂 Welcome to the VIP Lounge! Here is your free champagne. '
    ];
})->middleware('vip');