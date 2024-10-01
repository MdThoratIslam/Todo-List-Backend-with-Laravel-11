<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Task\TaskController;

Route::middleware('auth:sanctum')->group(function ()
{
    Route::apiResource('/users',                       UserController::class);
    Route::apiResource('/tasks',                       TaskController::class);
});
