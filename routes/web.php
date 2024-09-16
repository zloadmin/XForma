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
use App\Livewire\Pages\UserAnswersPage;
use App\Livewire\Pages\UsersPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', LoginPage::class)
    ->middleware('guest')
    ->name('login-page');

Route::middleware('auth')->group(function () {
    Route::get('/', DashboardPage::class)->name('dashboard');
    Route::get('/quizzes', QuizzesPage::class)->name('quizzes-page');
    Route::get('/quiz/create', CreateQuizPage::class)->name('create-quiz-page');
    Route::get('/quiz/{quiz}/edit', EditQuizPage::class)->name('edit-quiz-page');
    Route::get('/quiz/{quiz}/questions', QuestionsPage::class)->name('questions-page');
    Route::get('/quiz/{quiz}/question/create', CreateQuestionPage::class)->name('create-question-page');
    Route::get('/quiz/{quiz}/question/{question}/edit', EditQuestionPage::class)->name('edit-question-page');

    Route::get('/user-answers', UserAnswersPage::class)->name('user-answers-page');
    Route::get('/users', UsersPage::class)->name('users-page');
    Route::get('/user/create', CreateUserPage::class)->name('create-user-page');
    Route::get('/user/{user}/edit', EditUserPage::class)->name('edit-user-page');

    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login-page');
    })->name('logout');
});


//Route::get('/posts', ShowPosts::class);
//
//Route::get('/users', ShowUsers::class);
