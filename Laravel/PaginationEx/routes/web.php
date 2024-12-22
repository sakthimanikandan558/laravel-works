<?php

use App\Http\Controllers\PageController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'displayFun'] )->name('display');