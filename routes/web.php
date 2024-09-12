<?php

use App\Livewire\Pages\DashboardPage;
use App\Livewire\Pages\LoginPage;
use App\Livewire\Pages\QuizzesPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', LoginPage::class)
    ->middleware('guest')
    ->name('login-page');

Route::middleware('auth')->group(function () {
    Route::get('/', DashboardPage::class)->name('dashboard');
    Route::get('/quizzes', QuizzesPage::class)->name('quizzes-page');

    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login-page');
    })->name('logout');
});


//Route::get('/posts', ShowPosts::class);
//
//Route::get('/users', ShowUsers::class);
