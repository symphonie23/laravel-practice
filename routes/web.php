<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Task Routes
Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);



Route::post('login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::get('tasks/create', 'TaskController@create')->name('tasks.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Define your protected routes here
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

