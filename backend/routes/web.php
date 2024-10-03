<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function ()
{
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
});


//Route::group([
////    'middleware' => 'jwt',
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('register', RegisterController::class);
//    Route::post('login', LoginController::class);
//    Route::post('logout', LogoutController::class);
//
//    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:api');
//});