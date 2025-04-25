

<?php

//primo esercizio
$classe = [
    [
        "nome" => "Mario",
        "cognome" => "Rossi",
        "eta" => 16,
        "media" => 7.5
    ],
    [
        "nome" => "Anna",
        "cognome" => "Verdi",
        "eta" => 17,
        "media" => 8.0
    ],
    [
        "nome" => "Luca",
        "cognome" => "Bianchi",
        "eta" => 16,
        "media" => 6.8
    ]
];

// Funzione per stampare l'elenco degli studenti
function stampaElencoStudenti($classe)
{
    echo "Elenco degli studenti:\n";
    foreach ($classe as $studente) {
        echo "- " . $studente['nome'] . " " . $studente['cognome'] .
            " (Età: " . $studente['eta'] . ", Media: " . $studente['media'] . ")\n";
    }
}

// Funzione per calcolare la media dei voti della classe
function calcolaMediaClasse($classe)
{
    $sommaMedia = 0;
    $numeroStudenti = count($classe);
    foreach ($classe as $studente) {
        $sommaMedia += $studente['media'];
    }
    return $numeroStudenti > 0 ? $sommaMedia / $numeroStudenti : 0;
}

// Stampa l'elenco degli studenti
stampaElencoStudenti($classe);

// Calcola e stampa la media dei voti della classe
$mediaClasse = calcolaMediaClasse($classe);
echo "\nMedia voti della classe: " . number_format($mediaClasse, 2) . "\n";



//Secondo esercizio

$prodotti = [
    [
        "nome" => "Laptop",
        "categoria" => "Elettronica",
        "prezzo" => 1000,
        "quantità_disponibile" => 10
    ],
    [
        "nome" => "Smartphone",
        "categoria" => "Elettronica",
        "prezzo" => 600,
        "quantità_disponibile" => 20
    ],
    [
        "nome" => "Tavolo",
        "categoria" => "Mobili",
        "prezzo" => 150,
        "quantità_disponibile" => 5
    ],
    [
        "nome" => "Sedia",
        "categoria" => "Mobili",
        "prezzo" => 50,
        "quantità_disponibile" => 30
    ],
    [
        "nome" => "Frigorifero",
        "categoria" => "Elettrodomestici",
        "prezzo" => 500,
        "quantità_disponibile" => 8
    ]
];

// Funzione per visualizzare tutti i prodotti
function visualizzaProdotti($prodotti)
{
    echo "Elenco dei prodotti:\n";
    foreach ($prodotti as $prodotto) {
        echo "- Nome: " . $prodotto["nome"] .
            ", Categoria: " . $prodotto["categoria"] .
            ", Prezzo: €" . $prodotto["prezzo"] .
            ", Quantità disponibile: " . $prodotto["quantità_disponibile"] . "\n";
    }
}

// Funzione per aggiornare la quantità disponibile di un prodotto
function aggiornaQuantità($prodotti, $nomeProdotto, $nuovaQuantità)
{
    foreach ($prodotti as &$prodotto) {
        if ($prodotto["nome"] === $nomeProdotto) {
            $prodotto["quantità_disponibile"] = $nuovaQuantità;
            echo "Quantità aggiornata per il prodotto: " . $nomeProdotto . "\n";
            return $prodotti;
        }
    }
    echo "Prodotto non trovato: " . $nomeProdotto . "\n";
    return $prodotti;
}

// Funzione per calcolare il valore totale dell'inventario
function calcolaValoreInventario($prodotti)
{
    $valoreTotale = 0;
    foreach ($prodotti as $prodotto) {
        $valoreTotale += $prodotto["prezzo"] * $prodotto["quantità_disponibile"];
    }
    return $valoreTotale;
}

// Visualizza i prodotti iniziali
visualizzaProdotti($prodotti);

// Aggiorna la quantità di un prodotto
$prodotti = aggiornaQuantità($prodotti, "Laptop", 5);

// Visualizza i prodotti dopo l'aggiornamento
echo "\nProdotti aggiornati:\n";
visualizzaProdotti($prodotti);

// Calcola e stampa il valore totale dell'inventario
$valoreTotale = calcolaValoreInventario($prodotti);
echo "\nValore totale dell'inventario: €" . number_format($valoreTotale, 2) . "\n";




//esercizio3


$utenti = [
    ["nome" => "Mario", "età" => 25, "email" => "mario@example.com", "abbonato" => true],
    ["nome" => "Luca", "età" => 30, "email" => "luca@example.com", "abbonato" => false],

];

//filtro gli abbonati
// function abbonati($utenti)
// {
//     if ('abbonato' === true && 'eta' >= 25) {
//         return true;
//     }
//     return false;
// }
