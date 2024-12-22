<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleCalendarController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('auth/google', [GoogleCalendarController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleCalendarController::class, 'handleGoogleCallback']);
Route::get('events', [GoogleCalendarController::class, 'showEvents']);

