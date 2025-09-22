<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/generate-questions/{lesson}', [MainController::class, 'generateQuestions'])->name('generate.questions');
Route::post('/submit-answers', [MainController::class, 'submitAnswers'])->name('submit.answers');
Route::get('/test', [MainController::class, 'test'])->name('test');
Route::post('/start-test', [MainController::class, 'startTest'])->name('start.test');
Route::post('/start-selective-test', [MainController::class, 'startSelectiveTest'])->name('start.selective.test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('lessons', \App\Http\Controllers\Admin\LessonController::class);
    Route::resource('lessons.questions', \App\Http\Controllers\Admin\QuestionController::class);
});
