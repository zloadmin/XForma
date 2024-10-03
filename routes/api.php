<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Tikcet\TicketController;
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
            Route::get('{quiz}', [QuizController::class, 'show']);
            Route::get('{quiz}/statistics', [QuizController::class, 'statistics']);
            Route::post('{quiz_id}/question/{question_id}/answer/{answer_id}', [QuizController::class, 'answerToQuestion']);
        });
        Route::prefix('ticket')->group(function () {
            Route::get('list', [TicketController::class, 'list']);
            Route::get('{ticket}', [TicketController::class, 'show']);
        });
    });
});
//Route::post('test', function (Request $request) {
//    \App\Models\Answer::query()->first()->storeMedia($request->file('file'));
//});