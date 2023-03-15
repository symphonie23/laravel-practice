<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Authentication routes
Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
    