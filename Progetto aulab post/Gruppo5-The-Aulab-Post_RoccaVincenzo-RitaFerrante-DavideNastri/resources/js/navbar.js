


document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    const isHomepage = document.body.classList.contains('is-homepage');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    // Applica la classe scrolled immediatamente se non siamo nella homepage
    if (!isHomepage && navbar) {
        navbar.classList.add('navbar--scrolled');
    }

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar--scrolled');
        } else if (isHomepage) {
            // Rimuove la classe solo se siamo nella homepage
            navbar.classList.remove('navbar--scrolled');
        }
    });
    
    // Gestione del menu hamburger per evitare sovrapposizioni
    if (navbarToggler && navbarCollapse) {
        // Osserva i cambiamenti nel collasso della navbar
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    if (navbarCollapse.classList.contains('show')) {
                        document.body.classList.add('menu-open');
                        // Blocca lo scroll del body quando il menu è aperto
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.classList.remove('menu-open');
                        // Ripristina lo scroll
                        document.body.style.overflow = '';
                    }
                }
            });
        });
        
        observer.observe(navbarCollapse, { attributes: true });
        
        // SOLUZIONE SEMPLIFICATA PER I DROPDOWN MOBILE
        // Rimuoviamo tutti gli event listener personalizzati e lasciamo che Bootstrap gestisca i dropdown
        
        // 1. Rimuovi gli attributi data-bs-toggle e data-bs-target dai dropdown toggle in mobile
        function updateDropdownToggles() {
            if (window.innerWidth < 992) {
                document.querySelectorAll('.navbar__dropdown-toggle, .dropdown-toggle').forEach(toggle => {
                    toggle.removeAttribute('data-bs-toggle');
                    toggle.removeAttribute('data-bs-target');
                    
                    // Aggiungi un event listener diretto
                    toggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const dropdownMenu = this.nextElementSibling;
                        if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                            // Chiudi tutti gli altri dropdown
                            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                                if (menu !== dropdownMenu) {
                                    menu.classList.remove('show');
                                }
                            });
                            
                            // Toggle del dropdown corrente
                            dropdownMenu.classList.toggle('show');
                            
                            // Forza gli stili per la visualizzazione
                            if (dropdownMenu.classList.contains('show')) {
                                dropdownMenu.style.cssText = `
                                    display: block !important;
                                    visibility: visible !important;
                                    opacity: 1 !important;
                                    height: auto !important;
                                    overflow: visible !important;
                                    max-height: 500px !important;
                                    position: static !important;
                                    transform: none !important;
                                    margin-top: 5px !important;
                                    background-color: var(--color-primary-dark) !important;
                                `;
                            } else {
                                dropdownMenu.style.cssText = '';
                            }
                        }
                    });
                });
                
                // Assicurati che i link nei dropdown funzionino correttamente
                document.querySelectorAll('.dropdown-item, .navbar__dropdown-item').forEach(item => {
                    item.addEventListener('click', function(e) {
                        // Non fermare la propagazione per i link normali
                        const href = this.getAttribute('href');
                        if (href && href !== '#' && !href.startsWith('javascript:')) {
                            // Chiudi il menu hamburger dopo un breve ritardo
                            if (navbarCollapse.classList.contains('show')) {
                                setTimeout(() => {
                                    navbarToggler.click();
                                }, 150);
                            }
                        } else {
                            // Ferma la propagazione solo per i link che non navigano
                            e.stopPropagation();
                        }
                    });
                });
            } else {
                // Ripristina il comportamento normale per desktop
                document.querySelectorAll('.navbar__dropdown-toggle, .dropdown-toggle').forEach(toggle => {
                    if (!toggle.hasAttribute('data-bs-toggle')) {
                        toggle.setAttribute('data-bs-toggle', 'dropdown');
                    }
                });
            }
        }
        
        // Esegui all'avvio
        updateDropdownToggles();
        
        // Esegui quando la finestra viene ridimensionata
        window.addEventListener('resize', updateDropdownToggles);
        
        // Chiudi il menu quando si clicca su un link che non è un dropdown
        document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle):not(.navbar__dropdown-toggle)').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                }
            });
        });
        
        // Aggiungi gestione del tasto Escape per chiudere il menu
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.click();
                } else {
                    // Chiudi tutti i dropdown aperti
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                    });
                }
            }
        });
    }
});
