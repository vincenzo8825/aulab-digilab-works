/*Crea una rubrica contenente una lista di contatti e con le seguenti funzionalita':

Mostrare o nascondere la lista dei contatti
Popolare la tabella con i contatti presenti nell’array di partenza
Aggiungere un nuovo contatto
Eliminare un contatto in rubrica
ESEMPIO: Esercizio fatto durante la lezione scorsa.*/


let btnShowContact = document.querySelector('#btnShowContact');
let btnAddContact = document.querySelector('#btnAddContact');
let btnRemoveContact = document.querySelector('#btnRemoveContact');

let cardWrapper = document.querySelector('#cardWrapper');
let nameInput = document.querySelector('#nameInput'); 
let numberInput = document.querySelector('#numberInput'); 

let contactList = {
    contact: [
        { name: 'Mario', number: '1234567890' },
        { name: 'Antonio', number: '9876543210' },
        { name: 'Lucia', number: '0987654321' },
        { name: 'Giuseppe', number: '5555555555' },
        { name: 'Giovanni', number: '6666666666' }
    ]
};


function toggleContactList() {
    cardWrapper.classList.toggle('hide');
    if (cardWrapper.classList.contains('hide')) {
        btnShowContact.textContent = 'Mostra Rubrica';
    } else {
        btnShowContact.textContent = 'Nascondi Rubrica';
    }
}

btnShowContact.addEventListener('click', toggleContactList);

function populateTable() {
    let table = document.querySelector('#contactTable tbody');
    table.innerHTML = '';

    contactList.contact.forEach((contact, index) => {
        let row = document.createElement('tr');
        let nameCell = document.createElement('td');
        let numberCell = document.createElement('td');
        let actionCell = document.createElement('td'); 

        
        nameCell.textContent = contact.name;
        numberCell.textContent = contact.number;

        let deleteIcon = document.createElement('i');
        deleteIcon.className = 'bi bi-trash3 fs-2 icon text-danger'; 
        deleteIcon.style.cursor = 'pointer'; 

        deleteIcon.addEventListener('click', () => {
            contactList.contact.splice(index, 1); 
            populateTable(); 
        });

        actionCell.appendChild(deleteIcon);

        
        row.appendChild(nameCell);
        row.appendChild(numberCell);
        row.appendChild(actionCell);

        table.appendChild(row);
    });
}


function addContact() {
    let name = nameInput.value.trim();
    let number = numberInput.value.trim();

    if (name && number) {
        contactList.contact.push({ name, number });
        nameInput.value = '';
        numberInput.value = '';

        populateTable();
    } else {
        alert('Nome e numero di telefono obbligatori');
    }
}

btnAddContact.addEventListener('click', addContact);

function removeContact() {
    let name = nameInput.value.trim().toLowerCase();

    let index = contactList.contact.findIndex(contact => contact.name.toLowerCase() === name);
    if (index !== -1) {
        contactList.contact.splice(index, 1);
        populateTable();
        alert('Contatto eliminato');
    } else {
        alert('Contatto non trovato');
    }
    nameInput.value = '';
}

btnRemoveContact.addEventListener('click', removeContact);


populateTable();
















/*esercizio extra

                            
Crea una pagina web per gestire una partita di bowling. L'applicazione deve permettere di:

Aggiungere giocatori.
Generare dei punteggi casuali al click di un pulsante.
Visualizzare la lista dei giocatori con i loro punteggi.
Calcolare e visualizzare il vincitore.
Visualizzare una classifica ordinata in base al punteggio.
*/
