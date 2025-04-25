<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Rotte per gli articoli

Route::middleware(['auth'])->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article_create');
    Route::get('/article/index', function () {
        return view('article_index');
    })->name('article_index');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article_edit');
    Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article_destroy');
    Route::get('/article/show/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article_show');
});

// Rotte per la gestione dei ruoli (solo per amministratori)

Route::middleware(['auth'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/assign/{user}', [RoleController::class, 'assignRole'])->name('roles.assign');
    Route::delete('/roles/remove/{user}/{role}', [RoleController::class, 'removeRole'])->name('roles.remove');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/password', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
});

// Rotte per preferiti e recensioni
Route::middleware(['auth'])->group(function () {
    // Preferiti
    Route::post('/articles/{article}/favorite', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

    // Recensioni
    Route::post('/articles/{article}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/my-reviews', [ReviewController::class, 'userReviews'])->name('reviews.user');
});
