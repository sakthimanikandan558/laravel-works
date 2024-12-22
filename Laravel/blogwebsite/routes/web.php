<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContentWriterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form')->middleware('prevent-login-if-authenticated');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form')->middleware('prevent-login-if-authenticated');
Route::post('login', [LoginController::class, 'auth'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/admin/posts', [AdminController::class, 'index'])->name('admin.posts');
        Route::post('/admin/posts/{post}/approve', [AdminController::class, 'approve'])->name('admin.posts.approve');
        Route::post('/admin/posts/{post}/reject', [AdminController::class, 'reject'])->name('admin.posts.reject');
    });

    Route::middleware('content_writer')->group(function () {
        Route::get('content-writer/dashboard', [ContentWriterController::class, 'index'])->name('content.writer.dashboard');
        Route::post('content-writer/posts', [ContentWriterController::class, 'store'])->name('content.writer.posts.store');
        Route::patch('/content-writer/posts/update', [ContentWriterController::class, 'update'])->name('content.writer.posts.update');
    });

    Route::middleware('user')->group(function () {
        Route::get('/user/posts', [UserController::class, 'index'])->name('user.posts');
        Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
        Route::post('/post/{post}/like', [PostController::class, 'like'])->name('post.like');
        Route::post('/post/{post}/comment', [PostController::class, 'comment'])->name('post.comment');
        Route::patch('/comment/update', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');
    });


});


