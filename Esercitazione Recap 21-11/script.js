/*Esercizio 1: Gestione di una libreria
Crea un oggetto chiamato libreria che rappresenti una piccola libreria. L'oggetto deve avere:

Una proprietà libri (array) che inizialmente è vuota.
Un metodo aggiungiLibro(titolo, autore) per aggiungere un libro all'array.
Un metodo trovaLibro(titolo) che restituisce l'oggetto libro (con titolo e autore) se presente.
Un metodo rimuoviLibro(titolo) che rimuove un libro dall'array in base al titolo.

*/



let libreria = {
  libri : [ ],

  aggiungiLibro(titolo, autore) {
    this.libri.push({ titolo, autore });
  },

  trovaLibro(titolo) {
    return this.libri.find(libro => libro.titolo === titolo);
  },

  rimuoviLibro(titolo) {
    this.libri = this.libri.filter(libro => libro.titolo!== titolo);
  }
}



libreria.aggiungiLibro("foresta nera", "mario rossi");
libreria.aggiungiLibro("il diario", "michele bianchi");
console.log(libreria.trovaLibro("foresta nera"));

libreria.rimuoviLibro("foresta nera");
console.log(libreria.trovaLibro("foresta nera"));


console.log(libreria.libri);




 /*Esercizio 2

                            
Esercizio 2: Gestione di una playlist musicale
Crea un oggetto chiamato playlist che rappresenti una lista di canzoni. L'oggetto deve avere:

Una proprietà canzoni (array) che contiene oggetti con titolo e artista.
Un metodo aggiungiCanzone(titolo, artista) che aggiunge una canzone alla playlist.
Un metodo filtraPerArtista(artista) che restituisce tutte le canzoni di un determinato artista.
Un metodo ordinaCanzoni() che ordina la playlist alfabeticamente in base al titolo delle canzoni.

*/


let playlist = {
  canzoni : [],
  aggiungiCanzone(titolo, artista) {
    this.canzoni.push({ titolo, artista });
  },
  filtraPerArtista(artista) {
    return this.canzoni.filter(canzone => canzone.artista === artista);
  },
  ordinaCanzoni() {
    this.canzoni.sort((a, b) => a.titolo.localeCompare(b.titolo));
  }

}

playlist.aggiungiCanzone("vivere", "vasco rossi");

playlist.aggiungiCanzone("sally", "vasco rossi");

playlist.aggiungiCanzone("thunderstruck", "ac/dc");


console.log(playlist.canzoni);

console.log(playlist.filtraPerArtista("vasco rossi"));

console.log(playlist.canzoni);

playlist.ordinaCanzoni();



  /* Esercizio 3

                            
Esercizio 3: Gestione di una squadra di calcio
Crea un oggetto chiamato squadra che rappresenta una squadra di calcio. L'oggetto deve avere:

Una proprietà giocatori (array) che inizialmente è vuota.
Un metodo aggiungiGiocatore(nome, ruolo) per aggiungere un giocatore alla squadra.
Un metodo ottieniGiocatoriPerRuolo(ruolo) che restituisce tutti i giocatori con un ruolo specifico.
Un metodo totaleGiocatori() che restituisce il numero totale di giocatori nella squadra.
*/

let squadra = {
  giocatori : [ ],
  
  aggiungiGiocatore(nome, ruolo) {
    this.giocatori.push({ nome, ruolo });
  },
  ottieniGiocatoriPerRuolo(ruolo) {
    return this.giocatori.filter(giocatore => giocatore.ruolo === ruolo);
  },
  totaleGiocatori() {
    return this.giocatori.length;
  }

}

squadra.aggiungiGiocatore("giuseppe", "portiere");
squadra.aggiungiGiocatore("giovanni", "difensore");
squadra.aggiungiGiocatore("marco", "difensore");
squadra.aggiungiGiocatore("antonio", "centrocampista");
squadra.aggiungiGiocatore("giorgio", "attaccante");

console.log(squadra.giocatori);
console.log(squadra.ottieniGiocatoriPerRuolo("difensore"));
console.log(squadra.totaleGiocatori());









/*Esercizio 4

                            
Esercizio 4: Gestione di un carrello della spesa
Crea un oggetto chiamato carrello che rappresenta un carrello della spesa. L'oggetto deve avere:

Una proprietà prodotti (array) che contiene oggetti con nome, prezzo, e quantità.
Un metodo aggiungiProdotto(nome, prezzo, quantità) che aggiunge un prodotto al carrello (se il prodotto esiste già, aggiorna la quantità).
Un metodo calcolaTotale() che restituisce il totale del prezzo di tutti i prodotti nel carrello.
Un metodo rimuoviProdotto(nome) che rimuove un prodotto dal carrello in base al nome.

*/
let carrello = {
  prodotti : [ ],
  aggiungiProdotto(nome, prezzo, quantità) {
    let prodotto = this.prodotti.find(p => p.nome === nome);
    if (prodotto) {
      prodotto.quantità += quantità;
    } else {
      this.prodotti.push({ nome, prezzo, quantità });
    }
  },
  calcolaTotale() {
    return this.prodotti.reduce((acc, prodotto) => acc + (prodotto.prezzo * prodotto.quantità), 0);
  },
  rimuoviProdotto(nome) {
    this.prodotti = this.prodotti.filter(p => p.nome!== nome);
  }

}

carrello.aggiungiProdotto("pane", 10, 2);
carrello.aggiungiProdotto("pasta", 5, 1);
carrello.aggiungiProdotto("pizza", 10, 1);
carrello.aggiungiProdotto("pizza",12,5)
console.log(carrello.prodotti);
console.log(carrello.calcolaTotale());
carrello.rimuoviProdotto("pizza");
console.log(carrello.prodotti);
console.log(carrello.calcolaTotale());
