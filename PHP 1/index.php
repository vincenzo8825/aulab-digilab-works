<?php



// Esercizi:

// Dato un array di numeri a scelta, scrivere un programma che calcoli la media solo dei numeri pari contenuti all’interno dell’array

$numeriPari = [2, 4, 6, 8, 10];
$mediaPari = array_sum($numeriPari) / count($numeriPari);
echo "La media dei numeri pari è: " . $mediaPari;
echo "La media dei numeri pari è: " . $mediaPari;






// Dato un array contenente una serie di array associativi di utenti con nome, cognome e genere, per ogni utente stampare “Buongiorno Sig. Nome Cognome”  o “Buongiorno Sig.ra Nome Cognome” o “Buongiorno Nome Cognome” a seconda del genere

$users = [
              ['name' => 'Davide', 'surname' => 'Cariola', 'gender' => 'NB'],
        ];

foreach ($users as $user) {
    if ($user['gender'] === 'M') {
        echo "Buongiorno Sig. ". $user['name']. " ". $user['surname']. "\n";
    } elseif ($user['gender'] === 'F') {
        echo "Buongiorno Sig.ra ". $user['name']. " ". $user['surname']. "\n";
    } else {
        echo "Buongiorno ". $user['name']. " ". $user['surname']. "\n";
    }
}

	
// Scrivere un programma che stampi in console tutti i numeri da uno a cento. Se il numero è multiplo di 3 stampare “PHP” al posto del numero; se multiplo di 5 stampare “JAVASCRIPT”; se multiplo di 3 e 5 contemporaneamente deve stampare “CSS".

for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 === 0 && $i % 5 === 0) {
        echo "CSS\n";
    } elseif ($i % 3 === 0) {
        echo "PHP\n";
    } elseif ($i % 5 === 0) {
        echo "JAVASCRIPT\n";
    } else {
        echo $i . "\n";
    }

}


$arr=["marco","valerio","dario","gino"];
echo $arr[3];"\n";
echo $arr[1];"\n";
echo $arr[2];"\n";
echo $arr[2];"\n";



// Scrivi un programma in PHP che:

// Riceva due numeri ($numero1 e $numero2) come input.
// Effettui le seguenti operazioni sui due numeri: somma, sottrazione, moltiplicazione e divisione.
// Visualizzi i risultati di ciascuna operazione.



    




