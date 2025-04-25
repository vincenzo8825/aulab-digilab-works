// Esercizio 1: Somma di numeri positivi
// Scrivi una funzione che accetti un array di numeri come input e restituisca la somma solo dei numeri positivi.


let numeriPositivi=[1,2,3,4,5,6,7,8];

let filtraPositivi= numeriPositivi.filter(el=> el %2===0)
let sommaPositivi=filtraPositivi.reduce((a,b)=> a+b)
console.log(filtraPositivi,`${sommaPositivi}`);



// Esercizio 2: Trova il numero più grande
// Scrivi una funzione che accetti un array di numeri e restituisca il numero più grande nell'array.

function numeriPiuGrandi() {

    
}


// Esercizio 3: Generatore di tabelline
// Scrivi una funzione che accetti un numero come input e stampi nel console.log la sua tabellina fino a 10.


// Esercizio 4: Parola palindroma
// Scrivi una funzione che accetti una parola come input e verifichi se è palindroma (uguale se letta al contrario).

function Palindroma(parola) {
    // Rimuove gli spazi e converte la stringa in minuscolo per il confronto
    let caratteri = parola.replace(/\s+/g, '').toLowerCase();

    // Inverte la stringa
    let invertita = caratteri.split('').reverse().join('');

    // Confronta la stringa originale con la sua versione invertita
    if (caratteri === invertita) {
        console.log(parola + ' è palindroma');
    } else {
        console.log(parola + ' non è palindroma');
    }
}

// Test della funzione
Palindroma('radar');





// Esercizio 5: Contare le vocali
// Scrivi una funzione che accetti una stringa come input e restituisca il numero di vocali presenti nella stringa (a, e, i, o, u).


// Esercizio 6: Numeri pari e dispari
// Scrivi una funzione che generi 10 numeri casuali compresi tra 1 e 100 
// e restituisca due array separati, uno per i numeri pari e uno per i numeri dispari.


// Esercizio 7: Filtro di numeri
// Scrivi una funzione che accetti un array di numeri e restituisca un nuovo array contenente solo i numeri maggiori di 10.


// Esercizio 8: Conta le parole
// Scrivi una funzione che accetti una stringa come input e restituisca il numero di parole contenute nella stringa.


// Esercizio 9: FizzBuzz
// Scrivi una funzione che stampi i numeri da 1 a 100. 
// Per i numeri multipli di 3, stampa "Fizz" al posto del numero. 
// Per i numeri multipli di 5, stampa "Buzz". 
// Per i numeri multipli di entrambi, stampa "FizzBuzz".


// Esercizio 10: Array inverso
// Scrivi una funzione che accetti un array come input e restituisca un nuovo array con i numeri in ordine inverso.
