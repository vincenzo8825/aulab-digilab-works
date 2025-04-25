/*
ESERCIZIO 1



Scrivi un programma che converta un voto numerico (v) in un giudizio seguendo questi parametri:

se v e’ minore di 18,  stampare in console  “insufficiente”
se v e’ maggiore uguale a 18 e minore di 21,  stampare in console “sufficiente”
se v e’ maggiore uguale a 21 e minore di 24,  stampare in console: “buono”
se v e’ maggiore uguale a 24 e minore di 27, stampare in console: “distinto”
se v e’ maggiore uguale a 27 e minore uguale 29, stampare in console: “ottimo”
se v e’ uguale a 30, stampare in console:  “eccellente”
Esempio:
let v = 29;
Output: Ottimo
Cercate di risolvere questo esercizio utilizzando prima if, else e poi con switch.*/
let v = 3;

if (v < 18) {
    console.log("insufficiente");
} else if (v >= 18 && v < 21) {
    console.log("sufficiente");
} else if (v >= 21 && v < 24) {
    console.log("buono");
} else if (v >= 24 && v < 27) {
    console.log("distinto");
} else if (v >= 27 && v <= 29) {
    console.log("ottimo");
} else if (v === 30) {
    console.log("eccellente");
} else {
    console.log("Valore non valido");
}












/*ESERCIZIO 2

Scrivi un programma che converta una temperatura inserita dall’utente con una delle seguenti descrizioni, stampate in console:

se temperatura e’ minore di 20, stampare “non ci sono piu’ le mezze stagioni”
se temperatura e’ maggiore uguale a 30, stampare “lu mare, lu sule e lu ientu”
se temperatura e’ minore di 30, stampare “mi dia una peroni sudata”
se temperatura e’ minore di 0, stampare “non e’ tanto il freddo quanto l’umidità’”
se temperatura e’ minore di -10, stampare “copriti…ancora ti raffreddi”
Cerca di risolvere questo esercizio utilizzando prima if else e poi con switch case.*/


let temp = 30;

if (temp < -10) {
    console.log("copriti…ancora ti raffreddi");
} else if (temp < 0) {
    console.log("non e’ tanto il freddo quanto l’umidità");
} else if (temp < 20) {
    console.log("non ci sono piu’ le mezze stagioni");
} else if (temp < 30) {
    console.log("mi dia una peroni sudata");
} else if (temp >= 30) {
    console.log("lu mare, lu sule e lu ientu");
}



let temperatura= -11;
switch(true){
    case (temperatura< -10):
    console.log("copriti che fa frddo");
    
}

/*for (let i= 0; i < 20; i++) {
    
    console.log(i);
}*/
let condizione = Math.random();
while(condizione > 0.3){
    console.log(condizione);
    condizione= Math.random
 console.log("ciclo finito");
    
}