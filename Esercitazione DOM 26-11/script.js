/*       Esercizio 1

                            
Lavora con il DOM:

crea una pagina HTML con 3 paragrafi e 3 bottoni. 
Il primo bottone dovra’ cambiare il colore del testo dei paragrafi in modo casuale.
ogni paragrafo dovra' avere un colore diverso. 
il secondo dovra’ rendere il testo dei paragrafi in grassetto. 
il terzo dovra’ far scomparire e ricomparire i paragrafi.
TIPS:

ricordati della proprieta’ display: none in CSS!
i colori su CSS sono formati da R, G e B. Quindi puoi settare un colore random semplicemente randomizzando questi tre valori e mettendoli insieme. Scopri come.       */

const paragrafi = document.querySelectorAll("p");
const btnColore = document.getElementById("btn-color");
const btnGrassetto = document.getElementById("btn-bold");
const btnToggle = document.getElementById("btn-toggle");

function ottenereColoreCasuale() {
  const r = Math.floor(Math.random() * 256);
  const g = Math.floor(Math.random() * 256);
  const b = Math.floor(Math.random() * 256);
  return `rgb(${r}, ${g}, ${b})`;
}

btnColore.addEventListener("click", () => {
  paragrafi.forEach(paragrafo => {
    paragrafo.style.color = ottenereColoreCasuale();
  });
});

btnGrassetto.addEventListener("click", () => {
  paragrafi.forEach(paragrafo => {
    paragrafo.style.fontWeight = 
      paragrafo.style.fontWeight === "bold" ? "normal" : "bold";
  });
});

btnToggle.addEventListener("click", () => {
  paragrafi.forEach(paragrafo => {
    paragrafo.classList.toggle("hidden");
  });
});


















/*    Esercizio 2

                            
Crea un file html con le seguenti caratteristiche:

un input per il titolo
una textarea per inserire un paragrafo
un bottone per creare l’articolo
Al click sul bottone, crea un articolo popolato dai valori prelevati dai due input

inserire nell’articolo anche la data di pubblicazione tramite questa istruzione → Date - JavaScript | MDN




let date = new Date();

let formatDate = date.toLocaleDateString()

EXTRA:

fai in modo che, cliccando sul bottone crea articolo, se titolo o paragrafo sono vuoti, esca un alert che informi l’utente del problema
fai in modo che, una volta creato l’articolo, gli input vengano puliti
Prendete questa immagine sottostante come esempio */



let articoli = [];

function salvaArticoli() {}

function caricaArticoli() {
  return articoli;
}

function eliminaArticolo(indice) {
  articoli.splice(indice, 1);
  visualizzaArticoli();
}

function visualizzaArticoli() {
  const contenitoreArticoli = document.getElementById('articles');
  contenitoreArticoli.innerHTML = '';
  
  articoli.forEach((articolo, i) => {
    const elementoArticolo = document.createElement('div');
    elementoArticolo.classList.add('article');
    
    const titoloArticolo = document.createElement('h2');
    titoloArticolo.textContent = articolo.title;
    
    const contenutoArticolo = document.createElement('p');
    contenutoArticolo.textContent = articolo.content;
    
    const dataArticolo = document.createElement('p');
    dataArticolo.textContent = `Data di pubblicazione: ${articolo.date}`;
    dataArticolo.classList.add('date');
    
    const pulsanteElimina = document.createElement('button');
    pulsanteElimina.textContent = 'Elimina';
    pulsanteElimina.addEventListener('click', function () {
          eliminaArticolo(i);
        });
        
        elementoArticolo.appendChild(titoloArticolo);
        elementoArticolo.appendChild(contenutoArticolo);
        elementoArticolo.appendChild(dataArticolo);
        elementoArticolo.appendChild(pulsanteElimina);
        
        contenitoreArticoli.appendChild(elementoArticolo);
      });
}

document.getElementById('createArticle').addEventListener('click', function () {
  const inputTitolo = document.getElementById('title');
  const inputContenuto = document.getElementById('content');
  
  const titolo = inputTitolo.value;
  const contenuto = inputContenuto.value;
  
  if (!titolo || !contenuto) {
    alert("Per favore, compila sia il titolo che il paragrafo!");
    return;
  }

  const data = new Date();
  const dataFormattata = data.toLocaleDateString();
  
  articoli.push({ title: titolo, content: contenuto, date: dataFormattata });
  
  visualizzaArticoli();
  
  inputTitolo.value = '';
  inputContenuto.value = '';
});

document.addEventListener('DOMContentLoaded', visualizzaArticoli);



/*svolto con localstorage esercizio 2
 
function salvaArticoli(articoli) {
  localStorage.setItem('articoli', JSON.stringify(articoli));
}

function caricaArticoli() {
  const articoliSalvati = localStorage.getItem('articoli');
  return articoliSalvati ? JSON.parse(articoliSalvati) : [];
}

function eliminaArticolo(indice) {
  const articoli = caricaArticoli();
  articoli.splice(indice, 1);
  salvaArticoli(articoli);
  visualizzaArticoli();
}

function visualizzaArticoli() {
  const articoli = caricaArticoli();
  const contenitoreArticoli = document.getElementById('articles');
  contenitoreArticoli.innerHTML = '';

  articoli.forEach((articolo, i) => {
      const elementoArticolo = document.createElement('div');
      elementoArticolo.classList.add('article');

      const titoloArticolo = document.createElement('h2');
      titoloArticolo.textContent = articolo.title;

      const contenutoArticolo = document.createElement('p');
      contenutoArticolo.textContent = articolo.content;

      const dataArticolo = document.createElement('p');
      dataArticolo.textContent = `Data di pubblicazione: ${articolo.date}`;
      dataArticolo.classList.add('date');

      const pulsanteElimina = document.createElement('button');
      pulsanteElimina.textContent = 'Elimina';
      pulsanteElimina.addEventListener('click', function () {
          eliminaArticolo(i);
      });

      elementoArticolo.appendChild(titoloArticolo);
      elementoArticolo.appendChild(contenutoArticolo);
      elementoArticolo.appendChild(dataArticolo);
      elementoArticolo.appendChild(pulsanteElimina);

      contenitoreArticoli.appendChild(elementoArticolo);
  });
}

document.getElementById('createArticle').addEventListener('click', function () {
  const inputTitolo = document.getElementById('title');
  const inputContenuto = document.getElementById('content');

  const titolo = inputTitolo.value;
  const contenuto = inputContenuto.value;

  if (!titolo || !contenuto) {
      alert("Per favore, compila sia il titolo che il paragrafo!");
      return;
  }

  const data = new Date();
  const dataFormattata = data.toLocaleDateString();

  const articoli = caricaArticoli();
  articoli.push({ title: titolo, content: contenuto, date: dataFormattata });

  salvaArticoli(articoli);
  visualizzaArticoli();

  inputTitolo.value = '';
  inputContenuto.value = '';
});

document.addEventListener('DOMContentLoaded', visualizzaArticoli);*/
/*esercizio 3


Crea una pagina con due campi di input numerici, un pulsante "Calcola Somma" e un paragrafo per visualizzare il risultato. Scrivi un JavaScript che, al clic del pulsante, legge i valori dei due input, calcola la loro somma e visualizza il risultato nel paragrafo.

*/
function calcolaSomma() {
  const num1 = parseFloat(document.getElementById('num1').value);
  const num2 = parseFloat(document.getElementById('num2').value);
  
  if (isNaN(num1) || isNaN(num2)) {
    document.getElementById('risultato').textContent = "Per favore, inserisci due numeri validi.";
  } else {
    const somma = num1 + num2;
    document.getElementById('risultato').textContent = 'La somma è: ' + somma;
  }
}

document.getElementById('calcolaBtn').addEventListener('click', calcolaSomma);




/*Esercizio 4

Crea una pagina con un campo di input per inserire l'età e un pulsante "Controlla". Quando premi il pulsante:

Se l'età è maggiore o uguale a 18, mostra un messaggio "Sei maggiorenne" in un paragrafo.
Altrimenti, mostra "Sei minorenne".*/

function controllaEtà() {
  const età = parseInt(document.getElementById('eta').value);

  if (isNaN(età)) {
    document.getElementById('risultato2').textContent = "Per favore, inserisci un'età valida.";
  } else if (età >= 18) {
    document.getElementById('risultato2').textContent = "Sei maggiorenne";
  } else {
    document.getElementById('risultato2').textContent = "Sei minorenne";
  }
}

document.getElementById('controllaEta').addEventListener('click', controllaEtà);


