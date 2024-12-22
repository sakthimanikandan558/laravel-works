<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Emptab1Controller;

Route::get('/emptab1/create', [Emptab1Controller::class, 'create']);
Route::post('/emptab1', [Emptab1Controller::class, 'store']);
