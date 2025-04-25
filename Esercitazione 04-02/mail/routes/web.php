<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MailController::class, 'home'])->name('home');
Route::get('/contattaci', [MailController::class, 'contactUs'])->name('contatti');
Route::post('/contattaci/submit', [MailController::class, 'contactSubmit'])->name('contattaci.submit');
