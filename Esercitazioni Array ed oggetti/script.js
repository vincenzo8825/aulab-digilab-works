/*Esercizio 1

                            
Scrivi un programma che dato un array di 10 numeri interi ordinati in modo casuale li riordini in modo decrescente.

Esempio:
Input: array = [3, 7, -2, 5, 8, 1, 2, 5, 6, -4]
Output: [8, 7, 6, 5, 3, 2, 1, -2, -4]
Variante:
Prova ad ordinali in modo crescente.*/

Array
let array = [3, 7, -2, 5, 8, 1, 2, 5, 6, -4]

function ordineDecrescente(a,b) {
    return b-a;
}
let arrayUnico= array.filter((arrayUnico,index) => array.indexOf(arrayUnico)===index  )
arrayUnico.sort(ordineDecrescente);
console.log(arrayUnico);

function ordineCrescente(a,b) {
    return a-b;
     
}
let arrayUnico2= array.filter((arrayUnico2,index) =>array.indexOf(arrayUnico2)=== index )
arrayUnico2.sort(ordineCrescente);
console.log(arrayUnico2);







/*Esercizio 2

                            
Scrivi un programma che dato un array di numeri, calcoli la media dei valori e restituisca in output la media e tutti i valori minori della media:  

Esempio:

    Input: a = [3, 5, 10, 2, 8]
    Output: media = 5.6, valori minori = [3, 5, 2]
Variante:

  Stampa anche quanti sono i valori minori della media e quanti quelli maggiori. */

// Array di numeri
let a = [3, 5, 10, 2, 8];

// Calcolo della somma e della media
let somma = 0;
for (let i = 0; i < a.length; i++) {
    somma += a[i];
}
let media = somma / a.length;

// Filtra i valori minori e maggiori della media
let minoriDellaMedia = a.filter(numero => numero < media);
let maggioriDellaMedia = a.filter(numero => numero > media);

console.log("Media:", media);
console.log("Valori minori della media:", minoriDellaMedia);
console.log("Valori maggiori della media:", maggioriDellaMedia);















  /*Esercizio 3

                            
Crea un oggetto persona con le seguenti caratteristiche:

nome
cognome
eta'
un metodo che permetta di salutare*/


let persona ={
nome: "Vincenzo",
cognome:"Rocca",
età:"36",
saluto: function() {
    alert(`Ciao,il mio nome è ${this.nome} il mio cognome ${this.cognome} e ho ${this.età} anni`)
}
}
console.log(persona);
persona.saluto();