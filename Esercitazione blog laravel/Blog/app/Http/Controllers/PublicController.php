<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    private $articoli = [
        [
            'id' => 1,
            'titolo' => 'Introduzione a Laravel',
            'testo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'dettaglio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ],
        [
            'id' => 2,
            'titolo' => 'Guida a Bootstrap',
            'testo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'dettaglio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ],
        [
            'id' => 3,
            'titolo' => 'Scopri  PHP',
            'testo' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'dettaglio' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]
    ];

    public function home()
    {
        return view('welcome', ['articoli' => $this->articoli]);
    }

    public function show($id)
    {
        $articolo = collect($this->articoli)->firstWhere('id', $id);

        if (!$articolo) {
            abort(404);
        }

        return view('components.articolo', ['articolo' => $articolo]);

    }
}
