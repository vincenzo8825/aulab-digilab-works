                            
//Dati seguenti array mischiati e confusi:

let array_1 = [

 ['un', 'per', 'incatenarli.'],

 ['Anello', 'trovarli,'],

 ['ghermirli', 'e'],

 ['gondor', 'mark'],

];

let array_2 = [

 [['trovarli,']],

 ['tu,', 'sciocchi'],

 ['tu,', 'sciocchi', ['padron', 'Sauron']],

 ['nel', ['fuggite', 'gandalf']],

 [['domarli,', 'passare'], 'buio']

];

/*Stampa a schermo la frase: "Un Anello per domarli, un Anello per trovarli, un Anello per ghermirli e nel buio incatenarli.“
HINT

Non tutte le parole sono necessarie per la frase;

Occhio agli array annidati*/


let frase = array_1[0][0] + " " +
            array_1[1][0] + " " +
            array_2[4][0][0].slice(0, -1) + " " +
            array_1[0][0] + " " +
            array_1[1][0] + " " +
            array_1[1][1].slice(0, -1) + " " +
            array_1[0][0] + " " +
            array_1[1][0] + " " +
            array_1[2][0] + " " +
            array_1[2][1] + " " +
            array_2[3][0] + " " +
            array_2[4][1] + " " +
            array_1[0][2];

console.log(frase);































/*Esercizio 2

                            
Scrivi una funzione che simuli un gioco di dadi tra due utenti, partendo da un prompt che richieda quanti tiri sono da effettuarsi.



Stampare il giocatore che ha totalizzato più punti, tenendo conto che:

ogni dado ha 6 facce

ogni giocatore tirerà il dado n volte



Per ogni giocatore:

generare un numero casuale per ogni tiro che effettuerà,

ed ogni tiro sarà sommato ai precedenti per calcolare il punteggio finale del giocatore rispettivo.



TIPS:

Usiamo la formula per generare un numero random tra 1 e 6, già vista a lezione */

function giocoDadi() {
    // 1. Chiediamo all'utente quanti tiri fare
    let tiri = Number(prompt("Quanti tiri vuoi fare per ogni giocatore?"));
  
    // 2. Funzione per simulare il tiro di un dado (numero casuale tra 1 e 6)
    function tiraDado() {
      return Math.floor(Math.random() * 6) + 1;
    }
  
    // 3. Funzione per calcolare il punteggio di un giocatore
    function calcolaPunteggio() {
      let punteggio = 0;  // Iniziamo il punteggio a 0
      // 4. Eseguiamo il numero di tiri richiesti
      for (let i = 0; i < tiri; i++) {
        punteggio += tiraDado();  // Aggiungiamo il risultato del tiro al punteggio
      }
      return punteggio;  // Restituiamo il punteggio finale
    }
  
    // 5. Calcoliamo il punteggio per entrambi i giocatori
    let punteggioGiocatore1 = calcolaPunteggio();
    let punteggioGiocatore2 = calcolaPunteggio();
  
    // 6. Stampiamo i punteggi dei giocatori
    console.log("Punteggio Giocatore 1: " + punteggioGiocatore1);
    console.log("Punteggio Giocatore 2: " + punteggioGiocatore2);
  
    // 7. Determiniamo il vincitore
    if (punteggioGiocatore1 > punteggioGiocatore2) {
      console.log("Il Giocatore 1 ha vinto!");
    } else if (punteggioGiocatore2 > punteggioGiocatore1) {
      console.log("Il Giocatore 2 ha vinto!");
    } else {
      console.log("Pareggio!");
    }
  }
  
  // 8. Chiamata della funzione per avviare il gioco
  giocoDadi();











                            
/*Scrivi una funzione che permetta di stampare in console tutti i numeri da 1 a N:



N dovra’ rappresentare il parametro formale della funzione

tutti i numeri multipli di 3 siano sostituiti dalla stringa 'Fizz',

tutti i numeri multipli di 5 siano sostituiti dalla stringa 'Buzz'

e tutti i numeri multipli di 15 siano sostituiti dalla stringa 'fizzBuzz'*/


function stampaNumeri(N) {
    for (let i = 1; i <= N; i++) {
        if (i % 15 === 0) {
            console.log('fizzBuzz');
        } else if (i % 3 === 0) {
            console.log('Fizz');
        } else if (i % 5 === 0) {
            console.log('Buzz');
        } else {
            console.log(i);
        }
    }
}
stampaNumeri(30);










/*Esercizio 4

                            
Scrivi una funzione che dato un numero intero (massimo 9999) conti da quante cifre è formato.



Esempio:

Input : 9 → output: 1 cifra

Input : 99 → output: 2 cifre

Input: 12000 → output: Numero troppo grande*/



  






/*Esercizio 5

                            
Scrivi un programma che dato un array di 10 numeri interi ordinati in modo casuale li riordini in modo decrescente.



Esempio:

Input: array = [3, 7, -2, 5, 8, 1, 2, 5, 6, -4]

Output: [8, 7, 6, 5, 3, 2, 1, -2, -4]



Variante:

Prova ad ordinali in modo crescente*/









/*Esercizio Extra

                            
Scrivi una funzione che prenda in input una stringa e restituisca TRUE se è palindroma, FALSE se non lo è.



Primo step: eliminare gli spazi e i segni di punteggiatura:

HINT 

Puoi eliminare spazi e segni di punteggiatura usando → str.replace(/\W/g, "")



Esempio:

Input: “i topi non avevano nipoti”

Output: true*/