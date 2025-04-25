<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PagineController;

// Homepage
Route::get('/', [PagineController::class, 'homepage'])->name('homepage');

// Chi siamo
Route::get('/chi-siamo', [PagineController::class, 'chiSiamo'])->name('chiSiamo');

// Servizi
Route::get('/servizi', [PagineController::class, 'servizi'])->name('servizi');

// Pagina di dettaglio del servizio
Route::get('/servizi/{id}', [PagineController::class, 'dettaglioServizio'])->name('dettaglioServizio');
