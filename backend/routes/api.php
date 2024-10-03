<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\CompleteTaskController;

Route::middleware('auth:api')->group(function ()
{
    Route::apiResource('/users',                       UserController::class);
});
Route::apiResource('/tasks',                       TaskController::class);
Route::patch('/tasks/{task}/complete',             CompleteTaskController::class);