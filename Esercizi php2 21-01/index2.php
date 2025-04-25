<?php

// Es 2 (es php - array associativo, funzioni, metodi degli array)

// Crea un array associativo che rappresenti una rubrica telefonica. Ogni elemento
// dell'array deve avere come chiave il nome di una persona e come valore il suo
// numero di telefono. Scrivi una funzione che permetta all'utente di cercare un
// numero di telefono dato il nome (suggerimento: cerca nella documentazione php il
// metodo isset())



$rubrica=[

    "Alessandro" => 5115518,

    "Beatrice" => 744444,
   
    "Carlo" => 484848189,
   
    "Diana" => 92848626,
   
    "Elisa" => 8448841110


];

function cercaNumero($rubrica)
{
$nome=readline('inserisci il nome:');
if (isset($rubrica[$nome])){
    echo "il numero di telefono di $nome è ".$rubrica[$nome];
}else {
       echo "il nome $nome 
        non è stato trovato in rubrica";
    }
}


cercaNumero($rubrica);




?>