/*Esercizio 1

                            
Crea un oggetto agenda con una proprietà che comprenda una lista di contatti con un nome e un numero di telefono, ed abbia diverse funzionalità tra cui:

mostrare tutti i contatti dell’agenda
mostrare un singolo contatto
eliminare un contatto dall’agenda
aggiungere un nuovo contatto
modificare un contatto esistente  .
*/

let rubrica = {
    'contatti': [
        { 'nome': 'Angela', 'telefono': '3331111111' },
        { 'nome': 'Annalisa', 'telefono': '3332222222' },
        { 'nome': 'Paola', 'telefono': '3333333333' },
        { 'nome': 'Emilia', 'telefono': '3334444444' }
    ],

    mostraTuttiContatti: function() {
        console.log("Elenco Contatti:");
        this.contatti.forEach(contatto => {
            console.log(`Nome: ${contatto.nome}, Telefono: ${contatto.telefono}`);
        });
    },

    mostraContatto: function(nome) {
        let contatto = this.contatti.find(contatto => contatto.nome === nome);
        if (contatto) {
            console.log(`Nome: ${contatto.nome}, Telefono: ${contatto.telefono}`);
        } else {
            console.log(`Contatto "${nome}" non trovato.`);
        }
    },

    eliminaContatto: function(nome) {
        let lunghezzaIniziale = this.contatti.length;
        this.contatti = this.contatti.filter(contatto => contatto.nome !== nome);
        if (this.contatti.length < lunghezzaIniziale) {
            console.log(`Contatto "${nome}" eliminato con successo.`);
        } else {
            console.log(`Contatto "${nome}" non trovato.`);
        }
    },

    aggiungiContatto: function(nome, telefono) {
        this.contatti.push({ 'nome': nome, 'telefono': telefono });
        console.log(`Contatto "${nome}" aggiunto con successo.`);
    },

    modificaContatto: function(nome, nuovoNome, nuovoTelefono) {
        let contattiModificati = this.contatti.filter(contatto => {
            if (contatto.nome === nome) {
                contatto.nome = nuovoNome || contatto.nome;
                contatto.telefono = nuovoTelefono || contatto.telefono;
                return true;
            }
            return false;
        });

        if (contattiModificati.length > 0) {
            console.log(`Contatto "${nome}" modificato con successo.`);
        } else {
            console.log(`Contatto "${nome}" non trovato.`);
        }
    }
};

rubrica.modificaContatto('Annalisa', 'Anna', '3336666666');
rubrica.mostraTuttiContatti();
rubrica.mostraContatto('Angela');
rubrica.eliminaContatto('Angela');
rubrica.aggiungiContatto('Giovanni', '3335555555');
rubrica.modificaContatto('Annalisa', 'Anna', '3336666666');
rubrica.mostraTuttiContatti();












/*Esercizio 2                            
Crea un oggetto bowling con le seguenti caratteristiche:

una proprietà che comprenda una lista di giocatori con un nome e i relativi punteggi
diverse funzionalità tra cui:
creare 10 punteggi casuali per ogni giocatore:
Suggerimento: questo metodo dovra’ ciclare tutti i giocatori, presenti nell’oggetto bowling, e aggiungere ad ogni proprieta’ scores, dieci punteggi casuali ad ogni giocatore
Per generare un punteggio casuale da 1 a 10 → Math.floor(Math.random() * (10 - 1 +1) + 1)
trovare il punteggio finale per ogni giocatore:
Suggerimento: ordinare l’array in ordine Decrescente (Attenzione! E’ un array di oggetti: Array.prototype.sort() - JavaScript | MDN )
aggiungere un nuovo giocatore e creare 10 punti casuali anche per lui
determinare il vincitore
EXTRA:

Crea un metodo per stilare la classifica finale dei giocatori

DATI DI PARTENZA:
*/
let bowling = {
    giocatori: [
        { nome: 'Livio', punteggi: [] },
        { nome: 'Paola', punteggi: [] },
        { nome: 'Filippo', punteggi: [] },
        { nome: 'Giuseppe', punteggi: [] },
    ],

    generaPunteggi: function() {
        for (let giocatore of this.giocatori) {
            for (let i = 0; i < 10; i++) {
                giocatore.punteggi.push(Math.floor(Math.random() * 10) + 1);
            }
        }
    },

    calcolaPunteggiFinali: function() {
        this.giocatori.sort((a, b) => {
            const punteggioA = a.punteggi.reduce((acc, curr) => acc + curr, 0);
            const punteggioB = b.punteggi.reduce((acc, curr) => acc + curr, 0);
            return punteggioB - punteggioA;
        });
    },

    aggiungiGiocatore: function(nome) {
        const nuovoGiocatore = { nome: nome, punteggi: [] };
        this.giocatori.push(nuovoGiocatore);
        for (let i = 0; i < 10; i++) {
            nuovoGiocatore.punteggi.push(Math.floor(Math.random() * 10) + 1);
        }
    },

    determinaVincitore: function() {
        const vincitore = this.giocatori[0];
        const punteggioVincitore = vincitore.punteggi.reduce((acc, curr) => acc + curr, 0);
        console.log(`Il vincitore è ${vincitore.nome} con un punteggio finale di ${punteggioVincitore}`);
    },

    mostraClassifica: function() {
        console.log("Classifica Finale:");
        this.giocatori.forEach((giocatore, index) => {
            const punteggioTotale = giocatore.punteggi.reduce((acc, curr) => acc + curr, 0);
            console.log(`${index + 1}. ${giocatore.nome}: ${punteggioTotale} punti`);
        });
    }
};

bowling.generaPunteggi();
bowling.calcolaPunteggiFinali();
bowling.aggiungiGiocatore('Marco');
console.log("Classifica dopo l'aggiunta del nuovo giocatore:");
bowling.mostraClassifica();

console.log("\nDeterminazione del vincitore...");
bowling.determinaVincitore();

console.log("\nClassifica finale:");
bowling.mostraClassifica();
