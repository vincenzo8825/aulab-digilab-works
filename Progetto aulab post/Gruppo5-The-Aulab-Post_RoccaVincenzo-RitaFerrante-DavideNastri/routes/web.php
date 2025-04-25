<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\CategoryController;

// Public routes
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Article routes (public)
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/author/{user}', [ArticleController::class, 'byAuthor'])->name('article.byAuthor');

// Careers routes
Route::get('/careers', [PublicController::class, 'careers'])->name('careers')->middleware('auth');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit')->middleware('auth');

// Admin routes
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/set-admin/{user}', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/set-revisor/{user}', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/set-writer/{user}', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::post('/admin/requests/reject-all/{role}', [AdminController::class, 'rejectAllRequests'])->name('admin.requests.rejectAll');
    Route::delete('/admin/requests/{user}/reject', [AdminController::class, 'rejectRequest'])->name('admin.requests.reject');

    // Rotte per i tags
    Route::resource('admin/tags', TagController::class, ['as' => 'admin']);

    // Rotte per le categorie
    Route::resource('admin/categories', CategoryController::class, ['as' => 'admin']);
});

// Revisor routes
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    // Rotta per approvare un articolo
    Route::patch('/revisor/article/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    
    // Rotta per rimettere in revisione un articolo
    Route::patch('/revisor/article/{article}/revert', [RevisorController::class, 'revertToReview'])->name('revisor.revertToReview');
    Route::patch('/revisor/article/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::patch('/revisor/article/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

// Writer routes
Route::middleware('writer')->group(function(){
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard'])->name('writer.dashboard');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

Route::get('/tag/{tag}', [ArticleController::class, 'byTag'])->name('article.byTag');


// Rotte per l'amministrazione
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::patch('/set-admin/{user}', [AdminController::class, 'setAdmin'])->name('setAdmin');
    Route::patch('/set-revisor/{user}', [AdminController::class, 'setRevisor'])->name('setRevisor');
    Route::patch('/set-writer/{user}', [AdminController::class, 'setWriter'])->name('setWriter');
    Route::post('/requests/reject-all/{role}', [AdminController::class, 'rejectAllRequests'])->name('requests.rejectAll');
    Route::delete('/requests/{user}/reject', [AdminController::class, 'rejectRequest'])->name('requests.reject');

    // Rotte per i tags
    Route::resource('tags', TagController::class);

    // Rotte per le categorie
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
});

Route::get('/chi-siamo', function () {
    return view('about');
})->name('about');

Route::get('/presentazione', function () {
    return view('presentazione');
})->name('presentazione');
