<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('register','Auth.register')->middleware('guest');
Route::post('store',[RegisterController::class,'store']);

Route::prefix('app')->middleware(['auth','admin1'])->group(function (){
    Route::view('home','home')->name('home');
    Route::view('adminhome','adminhome')->name('adminhome');
    Route::get('logout',[LoginController::class,'logout'])->withoutMiddleware(['auth','admin1']);
});




Route::view('login','Auth.login')->name('login')->middleware('guest');
Route::post('auth',[LoginController::class,'auth']);
