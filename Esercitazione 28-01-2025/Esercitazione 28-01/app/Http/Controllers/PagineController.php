<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagineController extends Controller
{
    // Homepage
    public function homepage()
    {
        return view('homepage');
    }

    // Chi siamo
    public function chiSiamo()
    {
        return view('chi-siamo');
    }

    public function servizi()
    {
        $servizi = [
            ['id' => 1, 'nome' => 'Web Development', 'descrizione' => 'Sviluppo di siti web moderni e responsivi.'],
            ['id' => 2, 'nome' => 'SEO', 'descrizione' => 'Ottimizzazione per i motori di ricerca.'],
            ['id' => 3, 'nome' => 'Digital Marketing', 'descrizione' => 'Strategie di marketing digitale.']
        ];

        return view('servizi', ['servizi' => $servizi]);
    }


    public function dettaglioServizio($id)
    {
        $servizi = [
            ['id' => 1, 'nome' => 'Web Development', 'descrizione' => 'Sviluppo di siti web moderni e responsivi.'],
            ['id' => 2, 'nome' => 'SEO', 'descrizione' => 'Ottimizzazione per i motori di ricerca.'],
            ['id' => 3, 'nome' => 'Digital Marketing', 'descrizione' => 'Strategie di marketing digitale.']
        ];

        $servizio = collect($servizi)->firstWhere('id', $id);

        if (!$servizio) {
            abort(404, 'Servizio non trovato.');
        }

        return view('dettaglio-servizio', ['servizio' => $servizio]);
    }
}
