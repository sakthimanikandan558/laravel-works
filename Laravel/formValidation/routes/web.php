<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/',[StudentController::class,'form'])->name('form');
Route::post('/validate',[StudentController::class,'register'])->name('validate');
