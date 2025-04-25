

/*2. Calcolare l'ipotenusa di un triangolo rettangolo di cateti 3 e 4.*/ 

function ipotenusa(cat1, cat2) {
    return Math.sqrt(Math.pow(cat1, 2) + Math.pow(cat2, 2));
}

console.log(ipotenusa(3, 4)); 





/* 3. Scrivere una funzione che, assegnati due numeri, generi un numero random, intero, fra i due assegnati (compresi).*/

let min=2;
let max=10;
let randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
console.log(randomNumber);






/* 4. Scrivere una funzione che trasformi un nome nelle sue iniziali. Ad esempio: "Tizio Caio" => "T.C." */

function iniziali(nome) {
    let parole = nome.split(" ");
    let iniziali = parole.map(parola => parola[0].toUpperCase()).join(".");
    return iniziali + "."; e
}

console.log(iniziali("Tizio Caio")); 
console.log(iniziali("Mario Rossi")); 
console.log(iniziali("Giulia Verdi")); 







/* 5. Scrivere una funzione che, assegnati tre numeri, ritorni true se i tre numeri possono essere i lati di un triangolo, false altrimenti. */

function isTriangolo(cat1, cat2, cat3) {
    return cat1 + cat2 > cat3 && cat1 + cat3 > cat2 && cat2 + cat3 > cat1;
}

console.log(isTriangolo(3, 4, 5)); 



/* 6. Congettura di Collatz: preso un numero naturale maggiore di 1, se questo è pari dividerlo per due, se dispari, moltiplicarlo per 3 e aggiungere 1. Ripetere. Qualunque sia il numero di partenza, l'algoritmo termina sempre ad 1. Scrivere una funzione che implementi l'algoritmo
e ritorni un array con il valore calcolato ad ogni interazione. Ad esempio, 10 = [10, 5, 16, 8, 4, 2, 1] */

function collatz(n) {
    let sequenza = [n];
    while (n!= 1) {
        if (n % 2 == 0) {
            n = n / 2;
        } else {
            n = 3 * n + 1;
        }
        sequenza.push(Math.floor(n));
    }
    return sequenza;

}

console.log(collatz(10)); 








/* 7. Scrivere un programma che stampi tutti i numeri da 1 a 100: per i multipli di 3 stampare "JAVA" (al posto del numero), per i multipli di
5 stampare "SCRIPT". Infine per i numeri multipli di 3 e 5 stampare invece "JAVASCRIPT"*/

for (let i = 1; i <= 100; i++) {
    if (i % 3 === 0 && i % 5 === 0) {
        console.log("JAVASCRIPT");
    } else if (i % 3 === 0) {
        console.log("JAVA");
    } else if (i % 5 === 0) {
        console.log("SCRIPT");
    } else {
        console.log(i);
    }
}


/* 8. Scrivere una funzione che, assegnato un numero n, ritorni la successione di Fibonacci fino all'n-simo numero sotto forma di array. Ad
esempio: 3 → [1,1,2], o ancora 9 => [1,1,2,3,5,8, 13, 21,34]  */

function fibonacci(n) {
    let sequence = [0, 1];
    while (sequence.length < n) {
        sequence.push(sequence[sequence.length - 1] + sequence[sequence.length - 2]);
    }
    return sequence;
}

console.log(fibonacci(9)); 



/* 9. Scrivere una funzione che, assegnato un numero n, ritorni se è primo in.*/
function numeroPrimo(n) {
    if (n <= 1) {
        return false;
    }
    for (let i = 2; i <= Math.sqrt(n); i++) {
        if (n % i === 0) {
            return false;
        }
    }
    return true;
}

console.log(numeroPrimo(17));


/* 10. Scrivere una funzione che, assegnata una stringa, ritorni la somma delle cifre in essa presenti. Ad esempio, "Sono 1 stringa di 6 parole" =>7 */

function sommaCifre(stringa) {
    let numeri = stringa.match(/\d/g);
    if (!numeri) return 0; 
    return numeri.reduce((acc, numero) => acc + parseInt(numero), 0);
}

console.log(sommaCifre("Sono 1 stringa di 6 parole")); 
console.log(sommaCifre("Non ci sono numeri")); 
console.log(sommaCifre("123abc456")); 



/*11scrivere una funzione che accetta come parametri un array di numeri ed un numero di soglia e restituisca un array formato dai numeri maggiori della soglia.*/

function numeriMaggiori(numeri, soglia) {
    return numeri.filter(numero => numero > soglia);
}

console.log(numeriMaggiori([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 6));  





/*12 scrivere una funzione che trasformi un numero in ore e minuti:ad esempio 3014=> 50:14 devono sempre essere presenti due cifre sia le ore che i minuti */

function oreMinuti(secondi) {
    let ore = Math.floor(secondi / 3600);
    let minuti = Math.floor((secondi % 3600) / 60);
    let secondiRestanti = secondi % 60;

    
    let oreFormattate = ore < 10 ? "0" + ore : ore;
    let minutiFormattati = minuti < 10 ? "0" + minuti : minuti;
    let secondiFormattati = secondiRestanti < 10 ? "0" + secondiRestanti : secondiRestanti;

    return `${oreFormattate}:${minutiFormattati}:${secondiFormattati}`;
}

console.log(oreMinuti(3014)); 
console.log(oreMinuti(60));   
console.log(oreMinuti(0));    





/* 13. Scrivere una funzione che generi un array formato da N numeri interi random,
fra un minimo ed un massimo assegnati.*/

function generaArrayRandom(min, max, n) {
    let array = [];
    for (let i = 0; i < n; i++) {
        array.push(Math.floor(Math.random() * (max - min + 1)) + min);
    }
    return array;
}

console.log(generaArrayRandom(1, 100, 10)); 




/* 14. Scrivere una funzione che trasforma un array di array (ogni elemento è una
coppia [primo, secondo] ) in un oggetto ({primo: secondo} ). Ad esempio: [["nome",
    "mario"], ["cognome", "rossi"], ["anni", 32]] => {nome: "mario", cognome: "rossi",
    anni: 32}*/


    function arrayInOggetto(arrayDiArray) {
        return arrayDiArray.reduce((accumulatore, coppia) => {
            const [chiave, valore] = coppia; 
            accumulatore[chiave] = valore;  
            return accumulatore;
        }, {}); 
    }
    
    console.log(arrayInOggetto([["nome", "mario"], ["cognome", "rossi"], ["anni", 32]]));
    
    





/*15. Scrivere una funzione che, assegnata una stringa, ritorni un oggetto con
chiavi le parole (distinte) e valori la loro frequenza. Ad esempio: "Quella cosa
affianco alla cosa sulla cosa" => {Quella: 1, cosa: 3, affianco: 1, alla: 1,
sulla: 1}*/

function paroleFrequenza(stringa) {
    let parole = stringa.toLowerCase().split(/\s+/);
    let paroleFrequenza = {};

    for (let parola of parole) {
        if (paroleFrequenza[parola]) {
            paroleFrequenza[parola]++;
        } else {
            paroleFrequenza[parola] = 1;
        }
    }

    return paroleFrequenza;
}

console.log(paroleFrequenza("Quella cosa affianco alla cosa sulla cosa"));





/* 16. Scrivere una funzione che, data una stringa, trasformi la prima lettera di
ogni parola in maiuscolo.*/

function primaLetteraMaiuscolo(stringa) {
    let parole = stringa.toLowerCase().split(/\s+/);
    let paroleConPrimaLetteraMaiuscolo = [];

    for (let parola of parole) {
        paroleConPrimaLetteraMaiuscolo.push(parola.charAt(0).toUpperCase() + parola.slice(1));
    }

    return paroleConPrimaLetteraMaiuscolo.join(" ");
}

console.log(primaLetteraMaiuscolo("ciao mondo come stai")); 




/*17. Scrivere una funzione che, assegnata una stringa, ritorni il numero di
vocali presenti (gestire le maiuscole).*/

function numeroVocali(stringa) {
    let vocali = "aeiouAEIOU";
    let conteggioVocali = 0;

    for (let carattere of stringa) {
        if (vocali.includes(carattere)) {
            conteggioVocali++;
        }
    }

    return conteggioVocali;
}

console.log(numeroVocali("ciao mondo come stai"));   



/*18 scrivere una funzione che acccetta una stringa e restituisce la parola piu lunga*/

function parolaPiuLunga(stringa) {
    let parole = stringa.split(/\s+/);
    let parolaPiuLunga = parole[0];

    for (let parola of parole) {
        if (parola.length > parolaPiuLunga.length) {
            parolaPiuLunga = parola;
        }
    }

    return parolaPiuLunga;
}

console.log(parolaPiuLunga("ciao mondo come stai"));





/*19 scrivere una funzione che accetta in ingresso un array di 0e 1  e restituisca l equivalente numero in base decimale.*/

function arrayBinarioDecimale(arrayBinario) {
    let numeroDecimale = parseInt(arrayBinario.join(""), 2);
    return numeroDecimale;
}

console.log(arrayBinarioDecimale([1, 0, 1, 1, 0]));  





/*20 scrivere una funzione che ritorni i giorni mancanti al natale*/

function giorniMancantiNatale() {
    let dataNatale = new Date("2024-12-25");
    let dataCorrente = new Date();

    let differenza = Math.floor((dataNatale - dataCorrente) / (1000 * 60 * 60 * 24));
    return differenza;
}

console.log(giorniMancantiNatale());



/*21 viene assegnata una stringa contenente solo caratteri 'x'ed 'y' .scrivere una funzione che ritorni se il numero di x e y è ugualr.ad esempio  'xxxyxxxyyy' => true'.*/

function numeroXxEguale(stringa) {
    let conteggioX = 0;
    let conteggioY = 0;

    for (let carattere of stringa) {
        if (carattere === 'x') {
            conteggioX++;
        } else if (carattere === 'y') {
            conteggioY++;
        }
    }

    return conteggioX === conteggioY;
}
    
console.log(numeroXxEguale('xxxyxxxyyy'));

/*21 Scrvi una funzione che assegnatta una stringa e un vocale ritorni kla stringa originaria con tutte le vocali cambiate in quella fornita.ad esempio ciao a tutti ,o  => Cooo o totto*/

function cambiaVocali(stringa, vocale) {
    let nuovaStringa = '';
    for (let carattere of stringa) {
        if (carattere === 'a' || carattere === 'e' || carattere === 'i' || carattere === 'o' || carattere === 'u') {
            nuovaStringa += vocale;
        } else {
            nuovaStringa += carattere;
        }
    }
    return nuovaStringa;
}

console.log(cambiaVocali('ciao a tutti', 'i'));

/*22  viene assegnato un array di nomi.Scrivi una funzione che accetta in ingresso l array ed un numero e ritorni un nuovo array,contenente solo nomi di lunghezza uguale al numero assegnato in ordine alfabetico.Extra: se la funzione viene invocata senza il secondo parametro deve ritornare tutti i nomi lunghi 5 lettere ad esempio (["Gigi","Tizio","Caio","Piero"])  */

/*function filtraNomi(nomi, lunghezza = 5) {
    return nomi.filter(nome => nome.length === lunghezza);
}

console.log(filtraNomi(["Gigi","Tizio","Caio","Piero"]));*/
function filtraNomi(nomi, lunghezza = 5) {
    const nomiFiltrati = nomi.filter(nome => nome.length === lunghezza);
    return nomiFiltrati.sort();
}

console.log(filtraNomi(["Gigi", "Tizio", "Caio", "Piero"])); 
console.log(filtraNomi(["Anna", "Luigi", "Mario", "Luca", "Giorgio"], 4)); 
console.log(filtraNomi(["Elena", "Gianni", "Sara", "Marco"], 3)); 

/* 23 Scrivere una funzione che accetta cone parametro un oggetto di studenti
e voti { "Tizio": 5, "Caio": 3, ...}. Calcolare la media dei voti, aumentarla
del 10% ed arrontondarla per difetto. Ritornare un oggetto con chiave il nome
dello studente, e con valore "Promosso con NN" o "Bocciato con NN", dove NN è
il voto dello studente presente nell'oggetto in entrata, a seconda che NN sia
maggiore o minore della media modificata.*/

let voti = { "Tizio": 5, "Caio": 3, "Sempronio": 7 };

function aggiungiStudente(nome, voto) {
    voti[nome] = voto; 
    console.log(`${nome} inserito con voto ${voto}`);
    console.log(mediaVoti(voti)); 
}

function mediaVoti(voti) {
    let sommaVoti = 0;
    let numeroStudenti = 0;

    for (let studente in voti) {
        sommaVoti += voti[studente];
        numeroStudenti++;
    }

    let media = sommaVoti / numeroStudenti;
    let mediaConAumento = media * 1.1;
    let mediaArrotondata = Math.floor(mediaConAumento);

    let risultati = {};

    for (let studente in voti) {
        let voto = voti[studente];
        if (voto > mediaArrotondata) {
            risultati[studente] = "Promosso con " + voto;
        } else {
            risultati[studente] = "Bocciato con " + voto;
        }
    }

    return risultati;
}


aggiungiStudente("Marco", 4); 
aggiungiStudente("Filippo", 8); 

/*___________________________________________*/



// Esercizio 1: Creazione di un Array
// Crea un array contenente almeno 5 nomi di frutta.
// Stampa in console l'intero array.

let frutta =["mela","pera","banana","pesca","uva"]
console.log(frutta);


// Esercizio 2: Accesso agli Elementi
// Crea un array con 5 numeri.
// Stampa in console il primo e l'ultimo numero dell'array.
let numeri= [5,6,9,2,1,]

console.log(`primo numero:`,numeri [0] );
console.log(`ultimo numero:`,numeri [numeri.length-1]);






// Esercizio 3: Aggiungere e Rimuovere Elementi
// Crea un array vuoto.
// Aggiungi tre colori (es. "rosso", "blu", "verde") usando push.
// Rimuovi l'ultimo colore usando pop.
// Stampa l'array in console dopo ogni operazione.




let array=[];
array.push("giallo","rosso","verde")

array.pop()
console.log(array);


// Esercizio 4: Cerca in un Array
// Crea un array di 5 nomi.
// Chiedi all'utente di inserire un nome tramite il prompt.
// Verifica se il nome inserito è presente nell'array.
// Mostra un messaggio in console con il risultato (presente o assente).

/*function verificaNome() {
    let nomi = ["gianni", "luca", "mario", "dario"]; // Array di nomi
    let nomeInserito = prompt("Inserisci un nome:"); // Chiede all'utente un nome
    
    // Verifica se il nome è presente nell'array
    if (nomi.includes(nomeInserito)) {
        console.log(`${nomeInserito} è presente nell'array.`);
    } else {
        console.log(`${nomeInserito} non è presente nell'array.`);
    }
}

// Chiama la funzione
verificaNome();*/


// Esercizio 5: Somma degli Elementi
// Crea un array con 5 numeri.
// Calcola la somma di tutti i numeri presenti nell'array.
// Stampa il risultato in console.
let arrayNumeri= [1,5,4];
let somma=0;
for (let i = 0; i < arrayNumeri.length; i++) {
    somma+=arrayNumeri [i];
    
}
console.log(`la somma dei numeri nell array è ${somma}`);


// Esercizio 6: Trova il Numero Massimo
// Crea un array con almeno 6 numeri.
// Trova il numero più grande nell'array (usa un ciclo o il metodo Math.max).
// Stampa il numero massimo in console.


let arraynumeri2=[4,6,7,11,14,50];

let=numeroPiuGrande=Math.max(...arraynumeri2)
console.log(`il numero piu grande in questo array è ${numeroPiuGrande}`);

// Esercizio 7: Inverti un Array
// Crea un array con almeno 5 elementi.
// Invertilo usando il metodo reverse.
// Stampa l'array prima e dopo l'inversione.


let frutto=["mela","banana","pera","melone"];
console.log(frutto);

frutto.reverse(...frutto);
console.log(frutto);




// Esercizio 8: Filtrare Numeri Pari
// Crea un array con almeno 8 numeri.
// Crea un nuovo array contenente solo i numeri pari, usando il metodo filter.
// Stampa il nuovo array in console.
let numeriPari= arraynumeri2.filter(num =>num% 2==0);
console.log(numeriPari);




// Esercizio 9: Unisci Due Array
// Crea due array, uno con nomi di animali e uno con nomi di città.
// Uniscili in un unico array usando concat.
// Stampa l'array risultante in console.


let animali1=["cane","gatto","cavallo",];
let citta=["parigi","Roma","firenze"];
let citta2=["como","genova","domodossola"];
 let unico=animali1.concat(...citta,citta);
 console.log(unico);
 




// Esercizio 10: Conta gli Elementi
// Crea un array con almeno 10 elementi.
// Conta quanti elementi ci sono nell'array usando la proprietà length.
// Stampa il risultato in console.


let oggettiScolastici = ['gomma', 'quaderno', 'matita','mouse','sedia','pc','koala'];
let lunghezzaArray=oggettiScolastici.length;
console.log(oggettiScolastici[0]);
console.log(oggettiScolastici[lunghezzaArray -1 ]);
