// Array di passaggi per fare il caffè
const steps = [
    "Inizio",
    "Aggiungi l'acqua alla caffettiera",
    "Aggiungi il caffè macinato ",
    "Chiudi e assembla la caffettiera",
    "Metti la caffettiera sul fornello",
    "Attendi che il caffè salga",
    "Spegni il fornello",
    "Versa e servi il caffè",
    "Fine"
];

// Seleziona il contenitore principale
const container = document.getElementById("container");

// Funzione per creare un blocco
function createBlock(text) {
    const block = document.createElement("div");
    block.className = "block";
    block.textContent = text;
    return block;
}

// Funzione per creare una freccia
function createArrow() {
    const arrow = document.createElement("div");
    arrow.className = "arrow";
    arrow.textContent = "↓";
    return arrow;
}

// Costruisce il diagramma a blocchi
steps.forEach((step, index) => {
    container.appendChild(createBlock(step));
    if (index < steps.length - 1) {
        container.appendChild(createArrow());
    }
});
