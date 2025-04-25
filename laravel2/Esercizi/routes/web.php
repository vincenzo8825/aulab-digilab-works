<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $listaAnimali = [
        [
            'razza' => 'Cane',
            'verso' => 'bau',
        ],
        [
            'razza' => 'Gatto',
            'verso' => 'miao',
        ],
        [
            'razza' => 'Coccodrillo',
            'verso' => 'buh',
        ],
        [
            'razza' => 'Dinosauro',
            'verso' => 'fff',
        ]
    ];
    return view('welcome', [ 'listaAnimali' => $listaAnimali]);
});




Route::get('/chiSiamo', function () {
    return view('chiSiamo');
});
Route::get('/contact', function () {
    return view('contatti');
});
