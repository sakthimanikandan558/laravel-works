<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Route to show the create user form
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); // Route to display a user's details


Route::get('/', function () {
    return view('welcome');
});
