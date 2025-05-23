<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::controller(GuestController::class)->group(function() {
    Route::get('/', 'index')->name('home');
});

Route::get('/post', [BlogController::class, 'index'])->name('post');
Route::get('/post/{id}', [BlogController::class, 'show'])->name('post.show');
