<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('posts.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/index', [TestController::class, 'index'])->name('posts.index');
    Route::get('/post/create', [TestController::class, 'create'])->name('posts.create');
    Route::post('/post', [TestController::class, 'store'])->name('posts.store');

    Route::get('/post/{id}', [TestController::class, 'show'])->name('posts.show');
    Route::get('/post/{post}/edit', [TestController::class, 'edit'])->name('posts.edit');
    Route::put('/post/{post}', [TestController::class, 'update'])->name('posts.update');
    Route::delete('/post/{post}', [TestController::class, 'destroy'])->name('posts.destroy');
});
