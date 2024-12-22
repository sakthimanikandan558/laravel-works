<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\GoogleController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::middleware('auth:sanctum')->get('/auth/user', [AuthController::class, 'getUser']);


Route::get('/auth/google/url', [GoogleController::class, 'getGoogleAuthUrl']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
