<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pdf', [App\Http\Controllers\HomeController::class, 'pdf'])->name('pdf');
Route::resource('lesson', LessonController::class);
Route::get('/question/index/{lessonId}',[QuestionController::class, 'index'])->name('question');
Route::post('/question/setCart',[QuestionController::class, 'setCart'])->name('question.setCart');
Route::get('/question/submitCart/{lessonId}',[QuestionController::class, 'submitCart'])->name('question.submitCart');
Route::get('/question/saveCart/{lessonId}',[QuestionController::class, 'saveCart'])->name('question.saveCart');
