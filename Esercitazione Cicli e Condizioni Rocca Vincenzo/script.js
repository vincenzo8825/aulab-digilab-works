/*ESERCIZIO 1



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

let v = 30;

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
    console.log("Valore fuori scala");
}


/* svolto con switch nonostante non gestisce intervalli in modo diretto,ma usando true come condizione per confrontare i valori in case
let v = 29;

switch (true) {
    case (v < 18):
        console.log("insufficiente");
        break;
    case (v >= 18 && v < 21):
        console.log("sufficiente");
        break;
    case (v >= 21 && v < 24):
        console.log("buono");
        break;
    case (v >= 24 && v < 27):
        console.log("distinto");
        break;
    case (v >= 27 && v <= 29):
        console.log("ottimo");
        break;
    case (v === 30):
        console.log("eccellente");
        break;
    default:
        console.log("Valore fuori scala");
}*/

    





/*ESERCIZIO 2

Scrivi un programma che converta una temperatura inserita dall’utente con una delle seguenti descrizioni, stampate in console:

se temperatura e’ minore di 20, stampare “non ci sono piu’ le mezze stagioni”
se temperatura e’ maggiore uguale a 30, stampare “lu mare, lu sule e lu ientu”
se temperatura e’ minore di 30, stampare “mi dia una peroni sudata”
se temperatura e’ minore di 0, stampare “non e’ tanto il freddo quanto l’umidità’”
se temperatura e’ minore di -10, stampare “copriti…ancora ti raffreddi”
Cerca di risolvere questo esercizio utilizzando prima if else e poi con switch case.*/

let num =20;

if (num < 20) {
    console.log("non ci sono piu' le mezze stagioni");
} else if (num >= 30) {
    console.log("lu mare, lu sule e lu ientu");
} else if (num < 30) {
    console.log("mi dia una peroni sudata");
} else if (num < 0) {
    console.log("non e' tanto il freddo quanto l'umidita'");
} else if (num < -10) {
    console.log("copriti...ancora ti raffreddi");
} else {
    console.log("Valore fuori scala");
}


/* svolto con switch nonostante non gestisce intervalli in modo diretto,ma usando true come condizione per confrontare i valori in case


let num = 20;

switch (true) {
    case (num < 20):
        console.log("non ci sono piu' le mezze stagioni");
        break;
    case (num >= 30):
        console.log("lu mare, lu sule e lu ientu");
        break;
    case (num < 30):
        console.log("mi dia una peroni sudata");
        break;
    case (num < 0):
        console.log("non e' tanto il freddo quanto l'umidita'");
        break;
    case (num < -10):
        console.log("copriti...ancora ti raffreddi");
        break;
    default:
        console.log("Valore fuori scala");
}








/*ESERCIZO 3

Scrivi un programma che dato un numero, let num = 2, stampi la rispettiva tabellina corrispondente.*/


let nume =2;

for (let i = 1; i <= 20; i++) {
    if (i % 2 == 0) {
        console.log(i);
    }
}

let sum = 0;

for (let i = 1; i <= nume; i++) {
    sum += i;
}

console.log("La somma dei primi " + nume + " numeri è: " + sum);

console.log("La media dei primi " + nume + " numeri è: " + sum / nume);

console.log("La somma dei quadrati dei primi " + nume + " numeri è: " + sum ** 2);









/*ESERCIZIO 4

Scrivi un programma che stampi dei numeri da 1 a 20 ma solo quelli pari. Di tutti i numeri dispari, invece, calcola anche la media e stampala a schermo.*/


    let numeri =  1
    while (numeri <= 20) {
        if (numeri % 2 === 0) {
            console.log(numeri);
        }
        numeri++;
    }
    
    let media = 0;
    let sommaDispari = 0;
    let numeroDispari = 1;
    
    while (numeroDispari <= 20) {
        sommaDispari += numeroDispari;
        numeroDispari += 2;
    }
    
    media = sommaDispari / 10;
    
    console.log("La media dei numeri dispari è: " + media);






/*ESERCIZIO 5

Scrivi un programma che simuli un distributore di bevande e che rispetti i seguenti passaggi:

l’utente deve poter inserire un numero
in console dev’essere stampato il messaggio del distributore
se inserisce 1, seleziona acqua e quindi stampare in console: “E’ stata selezionata l’acqua”
se inserisce 2, seleziona coca cola e quindi stampare in console: “E’ stata selezionata coca cola”
se inserisce 3, seleziona birra e quindi stampare in console: “E’ stata selezionata birra”
se inserisce qualcosa di diverso, il programma dovra’ riproporre automaticamente la domanda di partenza*/

let numero = 3;

switch (numero) {
    case 1:
        console.log("E' stata selezionata l'acqua");
        break;
    case 2:
        console.log("E' stata selezionata coca cola");
        break;
    case 3:
        console.log("E' stata selezionata birra");
        break;
    default:
        console.log("Domanda di partenza");
}
