let giocatori = [];

        let nomeGiocatoreInput = document.querySelector('#nomeGiocatore');
        let aggiungiGiocatoreBtn = document.querySelector('#aggiungiGiocatoreBtn');
        let generaPunteggiBtn = document.querySelector('#generaPunteggiBtn');
        let listaGiocatori = document.querySelector('#listaGiocatori');
        let classifica = document.querySelector('#classifica');
        let vincitore = document.querySelector('#vincitore');

        aggiungiGiocatoreBtn.addEventListener('click', () => {
            let nomeGiocatore = nomeGiocatoreInput.value.trim();
            if (nomeGiocatore) {
                if (giocatori.some(g => g.nome === nomeGiocatore)) {
                    alert("Questo giocatore è già stato aggiunto!");
                    return;
                }
                giocatori.push({ nome: nomeGiocatore, punteggio: 0 });
                nomeGiocatoreInput.value = "";
                aggiornaListaGiocatori();
            } else {
                alert("Inserisci un nome valido");
            }
        });

        generaPunteggiBtn.addEventListener("click", () => {
            if (giocatori.length === 0) {
                alert("Aggiungi almeno un giocatore");
                return;
            }

            giocatori.forEach(giocatore => {
                giocatore.punteggio = Math.floor(Math.random() * 201); // Da 0 a 200
            });
            aggiornaClassifica();
            mostraVincitore();
        });

        function aggiornaListaGiocatori() {
            listaGiocatori.innerHTML = '';
            giocatori.forEach(giocatore => {
                let li = document.createElement("li");
                li.textContent = giocatore.nome;
                listaGiocatori.appendChild(li);
            });
        }

        function aggiornaClassifica() {
            classifica.innerHTML = '';
            let giocatoriOrdinati = [...giocatori].sort((a, b) => b.punteggio - a.punteggio);
            giocatoriOrdinati.forEach(giocatore => {
                let li = document.createElement("li");
                li.textContent = `${giocatore.nome}: ${giocatore.punteggio}`;
                classifica.appendChild(li);
            });
        }

        function mostraVincitore() {
            if (giocatori.length > 0) {
                let vincitoreGiocatore = giocatori.reduce((prev, curr) => (prev.punteggio > curr.punteggio ? prev : curr));
                vincitore.textContent = `Il vincitore è ${vincitoreGiocatore.nome} con ${vincitoreGiocatore.punteggio} punti!`;
            }
        }