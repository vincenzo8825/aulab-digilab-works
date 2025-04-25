<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'home'])->name('homepage');



Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');


Route::get('/create/article',[ArticleController::class,'create'])->name('article.create');
Route::post('/create/article/submit',[ArticleController::class,'store'])->name('article.store');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');
