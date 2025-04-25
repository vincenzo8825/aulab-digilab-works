<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // comunicare con una singola tabella del db: Post (al singolare) comunica con la tabella posts (al plurale)
    // accedere ai dati in LETTURA e SCRITTURA
    protected $fillable = [
        // elenco delle caratteristiche comuni degli oggetti di classe Post: descrivendo la struttura dei singoli Post che saranno salvati nella tabella
        'title',
        'subtitle',
        'body',
        'img'
    ];

}
