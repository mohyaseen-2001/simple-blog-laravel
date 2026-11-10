<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [TestController::class, 'index'])->name('posts.index');

Route::get('/post/create', [TestController::class, 'create'])->name('posts.create');

Route::get('/post/{id}', [TestController::class, 'show'])->name('posts.show');
Route::post('/post', [TestController::class, 'store'])->name('posts.store');
Route::get('/post/{post}/edit',[TestController::class, 'edit'])->name('posts.edit');
Route::delete('/post/{post}', [TestController::class, 'destroy'])->name('posts.destroy');