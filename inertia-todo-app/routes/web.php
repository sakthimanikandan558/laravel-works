<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {

    Route::get('/register', function () {
        return Inertia::render('Auth/Register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', function () {
        return Inertia::render('Auth/Login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::get('/', [TodoController::class, 'index'])
        ->name('todos.index');

    Route::post('/todos', [TodoController::class, 'store'])
        ->name('todos.store');

    Route::put('/todos/{todo}', [TodoController::class, 'update'])
    ->name('todos.update');

    Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])
        ->name('todos.destroy');

    Route::patch('/todos/{todo}/toggle', [TodoController::class, 'toggle'])
        ->name('todos.toggle');

    Route::post('/logout', [AuthController::class, 'logout']);
});