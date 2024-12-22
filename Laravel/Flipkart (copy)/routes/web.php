<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}/customers', [ProductController::class, 'showCustomers'])->name('products.customers');
Route::get('/customers/{id}', [CustomerController::class, 'show']);


