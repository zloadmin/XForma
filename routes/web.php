<?php

use App\Livewire\Pages\CreateQuestionPage;
use App\Livewire\Pages\CreateUserPage;
use App\Livewire\Pages\DashboardPage;
use App\Livewire\Pages\EditQuestionPage;
use App\Livewire\Pages\EditUserPage;
use App\Livewire\Pages\LoginPage;
use App\Livewire\Pages\QuestionsPage;
use App\Livewire\Pages\Quiz\CreateQuizPage;
use App\Livewire\Pages\Quiz\EditQuizPage;
use App\Livewire\Pages\QuizzesPage;
use App\Livewire\Pages\ResultsPage;
use App\Livewire\Pages\StudentsPage;
use App\Livewire\Pages\TeachersPage;
use App\Livewire\Pages\TasksPage;
use App\Livewire\Pages\TicketsPage;
use App\Livewire\Pages\UserAnswersPage;
use App\Livewire\Pages\UsersPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', LoginPage::class)
    ->middleware('guest')
    ->name('login-page');

Route::middleware('auth')->group(function () {
//    Route::get('/', DashboardPage::class)->name('dashboard');
    Route::get('/teachers', TeachersPage::class)->name('teachers-page');
    Route::get('/students', StudentsPage::class)->name('students-page');
    Route::get('/tasks', TasksPage::class)->name('tasks-page');
    Route::get('/tickets', TicketsPage::class)->name('tickets-page');
//    Route::get('/results', ResultsPage::class)->name('results-page');
    Route::get('/', ResultsPage::class)->name('dashboard');

    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login-page');
    })->name('logout');
});


