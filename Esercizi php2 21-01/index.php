<?php


// Es 1 (es php - array associativo) 
// Crea un array associativo che rappresenti una lista di prodotti e i loro prezzi.
// Aggiungi almeno 5 prodotti (utilizzando il metodo readline()). Scrivi un programma
// per calcolare e stampare il prezzo totale di tutti i prodotti.



$array = [
    'pasta' => 4,
    'pane' => 3,
    'latte' => 1.50,
    'uova' => 2
];


while (true) {
  
    $prodotto = readline("Inserisci il nome del prodotto : ");
    
    
    if ($prodotto === 'fine') {
        break;
    }
    
 
    $prezzo = readline("Inserisci il prezzo di $prodotto: ");
    
    
    if (!is_numeric($prezzo) || $prezzo < 0) {
        echo "Prezzo non valido! Riprova.\n";
        continue;
    }
    
  
    $array[$prodotto] = $prezzo;
    echo "Prodotto aggiunto con successo!\n";
}


$prezzo_totale = array_sum($array);


echo "Ecco la lista dei prodotti:\n";
foreach ($array as $prodotto => $prezzo) {
    echo "- $prodotto: €$prezzo\n";
}
echo "Il prezzo totale è: €$prezzo_totale\n";




















?>
