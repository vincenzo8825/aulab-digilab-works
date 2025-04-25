<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\ArticleController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Home
Route::get('/', [PublicController::class, 'home'])->name('homepage');

// Pagina Chi Siamo
// Pagina Chi Siamo
Route::get('/chi-siamo', [PublicController::class, 'about'])->name('chiSiamo');

// Post
Route::get('/create/post', [PostController::class, 'create'])->name('post.create');
Route::post('/create/post/submit', [PostController::class, 'store'])->name('post.store');
Route::get('/post/index', [PostController::class, 'index'])->name('post.index');

// Articoli
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{article}/show', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete');

// Autenticazione con Fortify
Route::middleware('guest')->group(function () {
    Route::get('login', fn() => view('auth.login'))->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('register', fn() => view('auth.register'))->name('register');
});

// Logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/user/profile/{user}', [PublicController::class, 'profile'])->name('profile');



// public function storeUser(
//     Request $request,
//     CreatesNewUsers $creator
// ): RegisterResponse {
//     if (config('fortify.lowercase_usernames') && $request->has(Fortify::username())) {
//         $request->merge([
//             Fortify::username() => Str::lower($request->{Fortify::username()}),
//         ]);
//     }
//     event(new Registered($user = $creator->create($request->all())));

//     return app(RegisterResponse::class);
// }
Route::get('/category/{category}', [ArticleController::class, 'showCategoryArticles'])->name('category.articles');
Route::get('/account', [UserController::class, 'index'])->name('account')->middleware('auth');

Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');


Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
