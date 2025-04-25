/* Creare un programma che simuli il gioco Super Mario Bros.
*/


let difficulty = prompt("Scegli il livello di difficoltà: \n (1) Facile \n (2) Medio \n (3) Difficile");
let gameMode = prompt("Scegli la modalità di gioco: \n (1) Single player \n (2) Multiplayer");
let playerName = prompt("Scegli il tuo nome:");
let playerCharacter = prompt("Scegli il tuo personaggio: \n (1) Mario \n (2) Luigi");
let characterName = playerCharacter === '1'? "Mario" : "Luigi";
let score = 0;
let lives;

// Imposta le vite in base alla difficoltà scelta
if (difficulty === '1') {
    lives = 3;
} else if (difficulty === '2') {
    lives = 2;
} else if (difficulty === '3') {
    lives = 1;
} else {
    alert("Scelta non valida, livello impostato a Facile.");
    lives = 3;
}

// Messaggio iniziale sulla modalità di gioco
if (gameMode === '1') {
    alert(`hai scelto di giocare con ${characterName} ${playerName},ed  hai scelto la modalità single player.`);
} else if (gameMode === '2') {
    alert(`hai scelto di giocare con ${characterName} ,${playerName}, ed hai scelto la modalità multiplayer.`);
} else {
    alert(`${characterName}${playerName}, hai scelto la modalità single player.`);
    
}

// Ciclo dei nemici
let enemies = ["primo", "secondo", "terzo", "quarto"];
for (let i = 0; i < enemies.length && lives > 0; i++) {
    let action = prompt(`Attento, c'è un ${enemies[i]} nemico! Cosa vuoi fare? \n (1) Salta e corri via \n (2) Salta sopra al nemico ed eliminalo \n (3) Ti sei scontrato con il nemico`);

    // Determina l'azione in base alla scelta
    if (action === '1') {
        alert("Hai evitato il nemico in modo spettacolare!");
        score += 5;
    } else if (action === '2') {
        alert("Hai eliminato il nemico e guadagnato punti!");
        score += 10;
    } else if (action === '3') {
        alert("Oh no! Ti sei scontrato con il nemico e hai perso una vita.");
        lives--;
    } else {
        alert("Scelta non valida, hai perso un'opportunità!");
    }

    // Messaggio sulle vite rimanenti
    if (lives > 0) {
        alert(`Ti rimangono ${lives} vite.`);
    }
}


if (lives > 0) {
    alert(`Congratulazioni, ${playerName}! Hai completato il gioco con ${score} punti!`);
} else {
    alert(`Peccato, ${playerName}! Hai esaurito le vite e il gioco è finito. Punti totali: ${score}.`);
}

let playAgain = prompt("Vuoi giocare ancora? \n (1) Sì \n (2) No");
while (playAgain === '1') {
    
    score = 0;
    lives = difficulty === '1' ? 3 : (difficulty === '2' ? 2 : 1);

    // Ricomincia il ciclo dei nemici
    for (let i = 0; i < enemies.length && lives > 0; i++) {
        let action = prompt(`Attento, c'è un ${enemies[i]} nemico! Cosa vuoi fare? \n (1) Salta e corri via \n (2) Salta sopra al nemico ed eliminalo \n (3) Ti sei scontrato con il nemico`);

        if (action === '1') {
            alert("Hai evitato il nemico in modo spettacolare!");
            score += 5;
        } else if (action === '2') {
            alert("Hai eliminato il nemico e guadagnato punti!");
            score += 10;
        } else if (action === '3') {
            alert("Oh no! Ti sei scontrato con il nemico e hai perso una vita.");
            lives--;
        } else {
            alert("Scelta non valida, hai perso un'opportunità!");
        }

        if (lives > 0) {
            alert(`Ti rimangono ${lives} vite.`);
        }
    }

    if (lives > 0) {
        alert(`Congratulazioni, ${playerName}! Hai completato il gioco con ${score} punti!`);
    } else {
        alert(`Peccato, ${playerName}! Hai esaurito le vite e il gioco è finito. Punti totali: ${score}.`);
    }

    playAgain = prompt("Vuoi giocare ancora? \n (1) Sì \n (2) No");
}

alert("Grazie per aver giocato! A presto!");



/*

    let startGame = prompt("Sei pronto? \n (1) Inizia la partita \n (2) Esci dal gioco");

    let life = 2;

    while (startGame != '1' && startGame != '2') {

        startGame = prompt("Sei pronto? \n (1) Inizia la partita \n (2) Esci dal gioco");

    }
    if (startGame === '1') {
        alert("Partita iniziata");
        let enemy = prompt("Attento c'e' un nemico 🦔! Premi: \n (1) Salta e corri \n (2) Salta sopra al nemico ed eliminalo \n (3) ti sei scontrato con il nemico");

        switch (enemy) {
            case '1':
                alert(`C'e' mancato poco! Sei riuscito a schivare il tuo primo nemico`);
                break;
            case '2':
                alert(`WOW! Ottimo, l'hai fatto fuori! Continua cosi'!`);
                break;
            case '3':
                life--;
                alert(`Hai perso una vita. Ora ti rimangono ${life} ❤️❤️ vite`);
                break;
            default:
                alert(`Peccato sei stato troppo... GAME OVER!`);
                break;
        }
    } else {
        alert(`Ci vediamo la prossima, peccato che tu non voglia giocare oggi!`);
    }
    /*aggiunge una terza storia, con una scelta di nemico diverso e un'azione specifica a seguire in caso di vittoria*/
  /*  let story = prompt("Scegli una storia: \n (1) La prima storia \n (2) La seconda storia");
    let enemy = prompt("Attento c'e' un nemico! Premi: \n (1) Salta e corri \n (2) Salta sopra al nemico ed eliminalo \n (3) ti sei scontrato con il nemico");
    let action;
    switch (story) {
        case '1':
            if (enemy === '1') {
                action = "fai un'offesa al nemico";
            } else if (enemy === '2') {
                action = "salta sopra al nemico e ti colpisce";
            } else {
                action = "ti sei scontrato con il nemico";
            }
            break;
        case '2':
            if (enemy === '1') {
                action = "fai un'offesa al nemico";
            } else if (enemy === '2') {
                action = "salta sopra al nemico e ti colpisce";
            } else {
                action = "ti sei scontrato con il nemico";
            }
            break;
        default:
            action = "scelta non valida";
            break;
    }
    if (life > 0 && story === '1') {
        alert(`Congratulazioni! Hai vinto la prima storia! ${action}`);
    } else if (life > 0 && story === '2') {
        alert(`Congratulazioni! Hai vinto la seconda storia! ${action}`);
    } else {
        alert(`Peccato! Hai perso la partita. Hai mancato ${life} vite.`);
    }
    /*aggiunge un'ultima storia con una scelta di nemico diverso e un'azione specifica a seguire in caso di vittoria*/
   /* let finalStory = prompt("Scegli una storia: \n (1) La terza storia \n (2) La quarta storia");
    let finalEnemy = prompt("Attento c'e' un nemico! Premi: \n (1) Salta e corri \n (2) Salta sopra al nemico ed eliminalo \n (3) ti sei scontrato con il nemico");
    let finalAction;
    switch (finalStory) {
        case '1':
            if (finalEnemy === '1') {
                finalAction = "fai un'offesa al nemico";
            } else if (finalEnemy === '2') {
                finalAction = "salta sopra al nemico e ti colpisce";
            } else {
                finalAction = "ti sei scontrato con il nemico";
            }
            break;
        case '2':
            if (finalEnemy === '1') {
                finalAction = "fai un'offesa al nemico";
            } else if (finalEnemy === '2') {
                finalAction = "salta sopra al nemico e ti colpisce";
            } else {
                finalAction = "ti sei scontrato con il nemico";
            }
            break;
        default:
            finalAction = "scelta non valida";
            break;
    }
    if (life > 0 && finalStory === '1') {
        alert(`Congratulazioni! Hai vinto la terza storia! ${finalAction}`);
    } else if (life > 0 && finalStory === '2') {
        alert(`Congratulazioni! Hai vinto la quarta storia! ${finalAction}`);
    } else {
        alert(`Peccato! Hai perso la partita. Hai mancato ${life} vite.`);
    }
    /*aggiunge un ultimo messaggio di conclusione*/
    /*alert(`Hai completato tutte le storie e hai vinto ${life} vite! Buona fortuna!`);
    /*aggiunge un'opzione per tornare al menu iniziale*/
   /* let playAgain = prompt("Vuoi giocare ancora? \n (1) Si \n (2) No");
    if (playAgain === '1') {
        startGame = prompt("Sei pronto? \n (1) Inizia la partita \n (2) Esci dal gioco");
        life = 2;
    } else {
        alert(`Ci vediamo la prossima, peccato che tu non voglia giocare oggi!`);
    }/**
     * ss
     */
        
    

     
    
   
    




    