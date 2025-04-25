<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/error-page', [PublicController::class, 'errorpage'])->name('errorpage');


Route::get('/posts/index', [PostController::class, 'index'])->name('posts_index');
Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('post_show');
Route::post('/posts/{post}/update', [PostController::class, 'update'])->name('post_update');
// Elimina un post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post_delete')->middleware('auth');
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('post_update');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post_edit');


// Create
Route::get('/post/create', [PostController::class, 'create'])->name('post_create');
Route::post('/post/store', [PostController::class, 'store'])->name('post_store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

