<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Quiz\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });
    // Auth
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('info', [AuthController::class, 'info']);
        Route::prefix('quiz')->group(function () {
            Route::get('list', [QuizController::class, 'list']);
            Route::get('show/{quiz}', [QuizController::class, 'show']);
        });
    });
});