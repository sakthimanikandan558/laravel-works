<?php

use App\Http\Controllers\DbController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DbController::class,'showData']);
