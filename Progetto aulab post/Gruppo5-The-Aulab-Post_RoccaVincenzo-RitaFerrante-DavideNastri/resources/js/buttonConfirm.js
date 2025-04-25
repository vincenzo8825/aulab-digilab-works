document.addEventListener('DOMContentLoaded', function() {
    // Seleziona tutti i pulsanti con la classe btn-confirm
    const confirmButtons = document.querySelectorAll('.btn-confirm');
    
    confirmButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Ottiengo l'ID dell'elemento e il tipo di azione
            const id = this.dataset.id;
            const action = this.dataset.action;
            const confirmMessage = this.dataset.message || 'Sei sicuro di voler procedere?';
            
            // Nascondi il pulsante originale
            this.style.display = 'none';
            
            // Trova il contenitore dei pulsanti di conferma
            const confirmContainer = document.querySelector(`.confirm-container-${action}-${id}`);
            if (confirmContainer) {
                // Mostra il messaggio di conferma
                const messageElement = confirmContainer.querySelector('.confirm-message');
                if (messageElement) {
                    messageElement.textContent = confirmMessage;
                }
                
                // Mostra i pulsanti di conferma con animazione
                confirmContainer.style.display = 'flex';
                confirmContainer.classList.add('fade-in-slide');
                
                // Imposta un timeout per nascondere i pulsanti di conferma dopo 5 secondi
                setTimeout(() => {
                    if (confirmContainer.style.display === 'flex') {
                        hideConfirmButtons(id, action);
                    }
                }, 5000);
            }
        });
    });
    
    // Aggiungi event listener ai pulsanti di annullamento
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Ottieni l'ID dell'elemento e il tipo di azione
            const id = this.dataset.id;
            const action = this.dataset.action;
            
            // Nascondi i pulsanti di conferma
            hideConfirmButtons(id, action);
        });
    });
    
    // Funzione per nascondere i pulsanti di conferma
    function hideConfirmButtons(id, action) {
        const confirmContainer = document.querySelector(`.confirm-container-${action}-${id}`);
        const originalButton = document.querySelector(`.btn-confirm[data-id="${id}"][data-action="${action}"]`);
        
        if (confirmContainer) {
            // Aggiungi classe per l'animazione di uscita
            confirmContainer.classList.add('fade-out-slide');
            
            // Dopo che l'animazione è completata, nascondi il contenitore e mostra il pulsante originale
            setTimeout(() => {
                confirmContainer.style.display = 'none';
                confirmContainer.classList.remove('fade-in-slide', 'fade-out-slide');
                if (originalButton) {
                    originalButton.style.display = 'inline-block';
                }
            }, 300);
        }
    }
    
    // Gestione dei pulsanti nella dashboard admin
    // Seleziona tutti i pulsanti di attivazione ruolo
    const roleButtons = document.querySelectorAll('.role-activate-btn');
    roleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.id;
            const action = this.dataset.action;
            
            // Nascondi il pulsante originale
            this.style.display = 'none';
            
            // Mostra i pulsanti di conferma
            const confirmContainer = document.querySelector(`.confirm-container-${action}-${userId}`);
            if (confirmContainer) {
                confirmContainer.style.display = 'flex';
            }
        });
    });
    
    // Gestione dei pulsanti di annullamento nella dashboard admin
    const cancelRoleButtons = document.querySelectorAll('.btn-cancel-action');
    cancelRoleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.id;
            const action = this.dataset.action;
            
            // Nascondi il container di conferma
            const confirmContainer = document.querySelector(`.confirm-container-${action}-${userId}`);
            if (confirmContainer) {
                confirmContainer.style.display = 'none';
            }
            
            // Mostra nuovamente il pulsante di attivazione
            const activateButton = document.querySelector(`.role-activate-btn[data-id="${userId}"][data-action="${action}"]`);
            if (activateButton) {
                activateButton.style.display = 'inline-block';
            }
        });
    });
});