///ESERCIZIO 1

/*Crea un file HTML e inserisci un tag script prima della chiusura del body (metodo interno). Poi al suo interno esegui i seguenti passaggi:

dichiara una variabile num1, e assegnale un numero qualsiasi
dichiara una variabile num2, e assegnale un numero qualsiasi
visualizza a schermo “Il valore della variabile num1 è tot“. Fai la stessa cosa per num2
dichiara una variabile chiamata stringa, e assegnale come valore una stringa qualsiasi
stampa a schermo “Il valore della variabile stringa è tot“
sostituisci il valore della variabile stringa con un qualsiasi altro valore e poi stampalo a schermo.
dichiara una costante chiamata PIGRECO, e assegnale un valore di 3.14159265359
visualizza a schermo “il valore di PIGRECO è tot”
prova a cambiare il valore della costante e devi cosa succede*/

let nume1=10;
let nume2=5;
let stringa=`50`
stringa='80'
console.log('il valore della variabile stringa è' + stringa);
const PIGRECO=`3.14159265359`;
console.log(`il valore di PIGRECO è ${PIGRECO}`);





/*ESERCIZIO 2

Crea 5 variabili contenenti un numero e scrivi un programma in modo da ottenere la somma tra questi numeri e la media.

In console poi mostra la seguente frase: ‘La somma tra i numeri equivale a … e la media equivale a…’ 
 */
let numero1= 50
let numero2= 10
let numero3= 20
let numero4= 30
let numero5= 40

let somma=numero1+numero2+numero3+numero4+numero5
console.log(somma);
let media =somma/5
console.log('la media equivale a ', media);







/*
ESERCIZIO 3

Crea due variabili contenenti l’anno corrente e l’anno di nascita di una persona. Crea un programma che calcoli:

l’età della persona
quanti anni sono necessari per raggiungere i 100
In console poi mostra la frase “Hai tot anni e ti mancano tot anni per compierne 100“./*
/** */

let anno100 = 100;
let annoCorrente = 2024;
let annoDiNascita = 1988;

let eta = annoCorrente - annoDiNascita;
let anniPer100 = anno100 - eta;

console.log("Hai", eta, "anni e ti mancano", anniPer100, "anni per compierne 100");


/*
ESERCIZIO 4

Crea due variabili i cui valori verranno scelti dall’utente. Crea un programma che esegua i seguenti calcoli su quei due numeri:

somma
sottrazione
moltiplicazione
divisione
potenza
In seguito in console stampa la frase “Con i numeri da te scelti, i risultati delle varie operazioni sono: somma (tot), sottrazione(tot) ecc ecc“.
	HINT
Usa parseInt() per trasformare il valore che inserisci nel prompt in un numero → es: parseInt(prompt('Inserisci un numero:')/* */

// Chiediamo all'utente di inserire due numeri


//let numero11 = parseInt(prompt("Inserisci il primo numero:"));//
//let numero22 = parseInt(prompt("Inserisci il secondo numero:"));

// Eseguiamo le operazioni
/*let sommasomma = numero11 + numero22;
let sottrazione = numero11 - numero22;
let moltiplicazione = numero11 * numero22;
let divisione = numero11 / numero22;
let potenza = numero11 ** numero22;

console.log("Con i numeri scelti, i risultati delle varie operazioni sono:");
console.log("Somma:", sommasomma);
console.log("Sottrazione:", sottrazione);
console.log("Moltiplicazione:", moltiplicazione);
console.log("Divisione:", divisione);
console.log("Potenza:", potenza);/**
 * 
 */

//Esercizio10//
///Inizializza e stampa variabili di vari tipi
//Crea una variabile chiamata nome e assegnale il tuo nome come stringa, una variabile eta e assegnale la tua età come numero, e una variabile amaProgrammare con un valore booleano (true o false). Stampa tutte le variabili nella console.


let nome ="Vincenzo";
let nome1="Dino";
let età =36;
let età1=43;
amaprogrammare=true
amaprogrammare1=false

console.log(nome , '',eta, '',amaprogrammare);
console.log(nome1 , '',età1, '',amaprogrammare1);








//Crea due variabili, nome e cognome, e assegnale il tuo nome e cognome. Poi crea una variabile messaggio che contenga la frase "Ciao, mi chiamo [nome] [cognome]!" e stampa messaggio nella console./*


let nome11= 'vincenzo';
let nome22= 'Dino';
let cognome ='Rocca';
let cognome2='Nicotera';
let messaggio='ciao ,mi chiamo';


console.log(messaggio,nome11,cognome);
console.log(messaggio, nome22,cognome2);










///Converti una stringa in numero e calcola un totale
///Crea una variabile prezzoStringa che contenga il valore "19.99". Trasforma prezzoStringa in un numero e assegnalo a una nuova variabile prezzoNumero. Crea un’altra variabile quantita con un numero intero a tua scelta e calcola il totale moltiplicando prezzoNumero per quantita. Stampa il totale nella console.

let prezzoStringa= '19.99';

let prezzoNumero= parseFloat(prezzoStringa);
let quantità = 1;
let totale= prezzoNumero*quantità;
console.log(totale);









/*
Calcola il prezzo con IVA e utilizza toFixed()
Crea una variabile prezzoBase e assegnale un valore numerico (ad esempio 100). Crea una variabile iva e assegna un valore percentuale (ad esempio 22). Calcola il prezzo finale applicando l'IVA al prezzoBase. Utilizza toFixed(2) per assicurarti che il risultato abbia due decimali. Stampa il prezzo finale nella console. Inoltre, crea un ciclo for che incrementi un contatore i da 1 a 5 e, per ogni iterazione, stampa il prezzo finale dopo aver aggiunto un incremento di i euro al prezzoBase./** */


let prezzoBase=100;
let iva=22;
let prezzoFinale=prezzoBase+(prezzoBase*iva/100);
let prezzoConIva=prezzoFinale.toFixed(2);
console.log('prezzofinale con iva:""'+prezzoConIva);

for( let i=1; i <=5; i++){
	let prezzoIncrementato=prezzoBase+i;
	let prezzoFinaleConIncrementi=prezzoIncrementato+(prezzoIncrementato*iva/100);
	let prezzoConIvaIncrementato= prezzoFinaleConIncrementi.toFixed(2);
	console.log(`prezzo finale con iva dopo incrementodi ${i} euro:${prezzoConIvaIncrementato}`);
	
	
}