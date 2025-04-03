<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Result\ResultController;
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
        Route::prefix('result')->group(function () {
            Route::post('store', [ResultController::class, 'store']);
        });
//        Route::prefix('ticket')->group(function () {
//            Route::get('list', [TicketController::class, 'list']);
//            Route::get('{ticket}', [TicketController::class, 'show']);
//            Route::post('answer/{ticket}/{ticketStep}/{ticketStepAction}', [TicketController::class, 'answer']);
//            Route::post('/finish/{ticket}', [TicketController::class, 'finish']);
//        });
    });
});
