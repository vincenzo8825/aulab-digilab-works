<x-layout>
    <div class="presentation-container">
        <div class="slide-progress"></div>
        <div class="slide-nav"></div>
        <div class="slide-controls">
            <button class="slide-control-btn prev-slide" aria-label="Slide precedente"><i class="bi bi-chevron-left"></i></button>
            <button class="slide-control-btn next-slide" aria-label="Slide successiva"><i class="bi bi-chevron-right"></i></button>
        </div>

    <!-- Slide 1: Hero -->
    <section class="slide slide-hero" id="slide-1">
        <div class="container text-center">
            <h1 class="slide-title">Verbahub</h1>
            <p class="slide-subtitle">
                Presentazione del progetto finale sviluppato dal team <span class="inkcoders-brand">InkCoders</span><br>
                Un percorso di 4 sprint per creare una piattaforma di pubblicazione articoli completa
            </p>
        </div>
    </section>

    <!-- Slide 2: Project Overview -->
    <section class="slide" id="slide-2">
        <div class="container">
            <div class="slide-content">
                <h2 class="slide-heading">Panoramica del Progetto</h2>
                <p class="slide-description">
                    Verbahub è una piattaforma di pubblicazione articoli con un sistema completo di gestione dei contenuti,
                    ruoli utente differenziati e un processo di revisione degli articoli prima della pubblicazione.
                </p>

                <div class="sprint-metrics">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-calendar-week"></i></div>
                        <div class="metric-value">4</div>
                        <div class="metric-label">Sprint completati</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-list-check"></i></div>
                        <div class="metric-value">7</div>
                        <div class="metric-label">User Stories implementate</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-people"></i></div>
                        <div class="metric-value">4</div>
                        <div class="metric-label">Membri del team</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-code-slash"></i></div>
                        <div class="metric-value">100%</div>
                        <div class="metric-label">Requisiti soddisfatti</div>
                    </div>
                </div>

                <div class="sprint-goals">
                    <div class="sprint-goals-icon">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="sprint-goals-content">
                        <h3>Obiettivo del Progetto</h3>
                        <p>Sviluppare una piattaforma di pubblicazione articoli completa con sistema di ruoli, revisione dei contenuti e gestione delle categorie, offrendo un'esperienza utente intuitiva sia per i lettori che per i redattori.</p>
                    </div>
                </div>

                <div class="team-contribution">
                    <h3>Contributi del Team</h3>
                    <div class="member-contribution">
                        <div class="member-name">Vincenzo Rocca</div>
                        <div class="contribution-bar-container">
                            <div class="contribution-bar" data-target="100"></div>
                        </div>
                        <div class="contribution-percentage">0%</div>
                    </div>
                    <div class="member-contribution">
                        <div class="member-name">Rita Ferrante</div>
                        <div class="contribution-bar-container">
                            <div class="contribution-bar" data-target="100"></div>
                        </div>
                        <div class="contribution-percentage">0%</div>
                    </div>
                    <div class="member-contribution">
                        <div class="member-name">Davide Nastri</div>
                        <div class="contribution-bar-container">
                            <div class="contribution-bar" data-target="100"></div>
                        </div>
                        <div class="contribution-percentage">0%</div>
                    </div>
                    <div class="member-contribution">
                        <div class="member-name">Maddalena Gliozzii</div>
                        <div class="contribution-bar-container">
                            <div class="contribution-bar" data-target="100"></div>
                        </div>
                        <div class="contribution-percentage">0%</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Slide 3: Sprint 1 -->
    <section class="slide" id="slide-3">
        <div class="container">
            <div class="slide-content">
                <span class="slide-week">Sprint 1</span>
                <h2 class="slide-heading">Scaffolding e Funzionalità Base</h2>

                <div class="sprint-metrics">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-calendar-check"></i></div>
                        <div class="metric-value">7</div>
                        <div class="metric-label">Giorni</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-check2-circle"></i></div>
                        <div class="metric-value">2</div>
                        <div class="metric-label">User Stories completate</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-lightning"></i></div>
                        <div class="metric-value">100%</div>
                        <div class="metric-label">Velocity</div>
                    </div>
                </div>

                <p class="slide-description">
                    Nel primo sprint abbiamo gettato le basi del progetto, configurando l'ambiente di sviluppo e implementando le funzionalità essenziali per la registrazione degli utenti e la visualizzazione degli articoli.
                </p>

                <div class="sprint-goals">
                    <div class="sprint-goals-icon">
                        <i class="bi bi-flag"></i>
                    </div>
                    <div class="sprint-goals-content">
                        <h3>Obiettivi dello Sprint</h3>
                        <p>Creare la struttura base del progetto e implementare le funzionalità di registrazione utenti e visualizzazione articoli, stabilendo l'architettura fondamentale del sistema.</p>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-gear-fill"></i>Configurazione Iniziale</h3>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione del progetto Laravel 12</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Configurazione del database MySQL</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Setup della repository GitHub</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Installazione di Bootstrap 5 e dipendenze</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione della struttura di base</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #1</h3>
                    <p class="user-story-quote">"Come Sara vorrei registrarmi in piattaforma per inserire un articolo, in modo tale da lavorare per The Aulab Post."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione del sistema di autenticazione</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione del modello Article con relazioni</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo del form per l'inserimento degli articoli</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione dell'upload delle immagini</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Validazione dei dati inseriti</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #2</h3>
                    <p class="user-story-quote">"Come Lorenzo vorrei visualizzare gli ultimi articoli sul portale in modo tale da informarmi su ciò che succede nel mondo."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione della homepage con gli articoli più recenti</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della pagina di dettaglio degli articoli</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo della funzionalità di ricerca per categoria</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della ricerca per scrittore</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Ottimizzazione del layout responsive</span>
                        </div>
                    </div>
                </div>

                <p class="slide-quote">
                    "Il primo sprint ci ha permesso di stabilire solide fondamenta tecniche e di definire il flusso di lavoro del team, creando un'architettura scalabile per le future implementazioni."
                </p>
            </div>
        </div>
    </section>

    <!-- Slide 4: Sprint 2 -->
    <!-- Slide 4: Week 3 (Enhanced) -->
    <section class="slide" id="slide-4">
        <div class="container">
            <div class="slide-content">
                <span class="slide-week">Settimana 3</span>
                <h2 class="slide-heading">Ricerca e Gestione Contenuti</h2>

                <!-- Added Sprint Metrics -->
                <div class="sprint-metrics">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-calendar-check"></i></div>
                        <div class="metric-value">7</div>
                        <div class="metric-label">Giorni</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-check2-circle"></i></div>
                        <div class="metric-value">2</div>
                        <div class="metric-label">User Stories completate</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-lightning"></i></div>
                        <div class="metric-value">100%</div>
                        <div class="metric-label">Velocity</div>
                    </div>
                </div>

                <p class="slide-description">
                    La terza settimana è stata dedicata all'implementazione delle User Stories #4 e #5, migliorando le funzionalità di ricerca e la gestione di tags e categorie per offrire un'esperienza utente più completa.
                </p>

                <!-- Added Sprint Goals -->
                <div class="sprint-goals">
                    <div class="sprint-goals-icon">
                        <i class="bi bi-flag"></i>
                    </div>
                    <div class="sprint-goals-content">
                        <h3>Obiettivi dello Sprint</h3>
                        <p>Migliorare le funzionalità di ricerca e implementare un sistema completo di gestione dei tags e delle categorie per rendere la piattaforma più flessibile e personalizzabile.</p>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #4</h3>
                    <p class="user-story-quote">"Come Lorenzo vorrei poter cercare tra gli articoli in modo tale da visualizzare subito quello che mi interessa."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della ricerca full-text con Laravel Scout</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo della ricerca per titolo con query ottimizzate</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della ricerca per sottotitolo</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Ottimizzazione della ricerca per categoria con filtri avanzati</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione di un'interfaccia di ricerca intuitiva e responsive</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #5</h3>
                    <p class="user-story-quote">"Come Corrado vorrei poter gestire in autonomia tags e categorie, in modo tale da avere una piattaforma sempre aggiornata."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione del modello Tag con relazione N-a-N con Article</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione del sistema di gestione dei tags per l'admin</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo del sistema di gestione delle categorie per l'admin</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Integrazione dei tags nei metadati della pagina di dettaglio</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della ricerca per tag con UI intuitiva</span>
                        </div>
                    </div>
                </div>

                <!-- Added Technical Challenge -->
                <p class="slide-quote">
                    "La sfida tecnica principale è stata l'implementazione di un sistema di ricerca efficiente che potesse gestire grandi volumi di articoli mantenendo performance ottimali. Abbiamo risolto questo problema utilizzando indici di database e query ottimizzate."
                </p>
            </div>
        </div>
    </section>

    <!-- Slide 5: Week 4 (Enhanced) -->
    <section class="slide" id="slide-5">
        <div class="container">
            <div class="slide-content">
                <span class="slide-week">Settimana 4</span>
                <h2 class="slide-heading">Gestione Articoli e Ottimizzazioni Finali</h2>

                <!-- Added Sprint Metrics -->
                <div class="sprint-metrics">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-calendar-check"></i></div>
                        <div class="metric-value">7</div>
                        <div class="metric-label">Giorni</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-check2-circle"></i></div>
                        <div class="metric-value">2</div>
                        <div class="metric-label">User Stories completate</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-lightning"></i></div>
                        <div class="metric-value">100%</div>
                        <div class="metric-label">Velocity</div>
                    </div>
                </div>

                <p class="slide-description">
                    L'ultima settimana è stata dedicata all'implementazione delle User Stories #6 e #7, completando le funzionalità di gestione degli articoli e aggiungendo miglioramenti significativi all'esperienza utente.
                </p>

                <!-- Added Sprint Goals -->
                <div class="sprint-goals">
                    <div class="sprint-goals-icon">
                        <i class="bi bi-flag"></i>
                    </div>
                    <div class="sprint-goals-content">
                        <h3>Obiettivi dello Sprint</h3>
                        <p>Completare le funzionalità di gestione degli articoli per i writer, migliorare l'esperienza utente con informazioni aggiuntive sugli articoli e finalizzare il progetto per la consegna.</p>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #6</h3>
                    <p class="user-story-quote">"Come Sara vorrei poter cancellare o modificare gli articoli che ho scritto in modo tale da consegnare sempre un lavoro d'alta qualità."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Creazione della dashboard personalizzata per i writer</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione della modifica degli articoli con validazione</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo della funzionalità di cancellazione sicura degli articoli</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione del ritorno alla revisione dopo la modifica</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Gestione ottimizzata delle immagini nello Storage con resize</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-person-fill"></i>User Story #7</h3>
                    <p class="user-story-quote">"Come Lorenzo vorrei più informazioni sull'articolo in modo tale da poter scegliere cosa leggere."</p>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione degli slug nei titoli per URL SEO-friendly</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo dell'algoritmo per il calcolo dei minuti di lettura</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Aggiunta di metadati avanzati per ogni articolo</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Testing finale di tutte le funzionalità con correzione bug</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Ottimizzazione delle performance con caching strategico</span>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Delivery Section -->
                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-flag-fill"></i>Consegna al Cliente</h3>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Preparazione della documentazione tecnica e utente</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Deployment della piattaforma in ambiente di produzione</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Presentazione finale al cliente con demo interattiva</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Raccolta feedback e pianificazione miglioramenti futuri</span>
                        </div>
                    </div>
                </div>

                <p class="slide-quote">
                    "Nell'ultima settimana abbiamo affrontato la sfida di ottimizzare le performance dell'applicazione, riducendo i tempi di caricamento e migliorando l'esperienza utente complessiva. Abbiamo implementato strategie di caching e ottimizzato le query al database."
                </p>
            </div>
        </div>
    </section>

    <!-- Slide 6: Risultati del Progetto -->
    <section class="slide" id="slide-6">
        <div class="container">
            <div class="slide-content">
                <h2 class="slide-heading">Risultati del Progetto</h2>

                <!-- Risultati-->
                <div class="sprint-metrics">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-code-square"></i></div>
                        <div class="metric-value">10+</div>
                        <div class="metric-label">Modelli creati</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-file-earmark-code"></i></div>
                        <div class="metric-value">10+</div>
                        <div class="metric-label">Controller</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-window"></i></div>
                        <div class="metric-value">20+</div>
                        <div class="metric-label">Viste</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon"><i class="bi bi-git"></i></div>
                        <div class="metric-value">100+</div>
                        <div class="metric-label">Commit</div>
                    </div>
                </div>

                <p class="slide-description">
                    Il progetto Verbahub è stato completato con successo, rispettando tutte le scadenze e implementando tutte le user stories richieste. Ecco i principali risultati raggiunti:
                </p>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-trophy"></i>Risultati Chiave</h3>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione completa di tutte le 7 user stories</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sistema di ruoli flessibile con Admin, Revisor e Writer</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Processo di revisione degli articoli efficiente e sicuro</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Funzionalità di ricerca avanzata per migliorare l'UX</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Design responsive e moderno con Bootstrap 5</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Ottimizzazione delle performance e della sicurezza</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-lightbulb"></i>Apprendimenti del Team</h3>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Miglioramento delle competenze tecniche in Laravel</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Sviluppo di capacità di lavoro in team e comunicazione</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Gestione efficace del tempo e delle priorità</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Implementazione di best practices di sviluppo</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-check-circle-fill task-icon"></i>
                            <span class="task-text">Risoluzione creativa dei problemi tecnici</span>
                        </div>
                    </div>
                </div>

                <div class="user-story">
                    <h3 class="user-story-title"><i class="bi bi-arrow-right-circle"></i> Eventuali Sviluppi Futuri</h3>
                    <div class="task-list">
                        <div class="task-item">
                            <i class="bi bi-star-fill task-icon"></i>
                            <span class="task-text">"Recensioni articoli, aumentando il coinvolgimento degli utenti e promuovendo dialoghi costruttivi sulla qualità dei contenuti."</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-star-fill task-icon"></i>
                            <span class="task-text">"Traduzione degli articoli, offrendo accessibilità globale e ampliando il pubblico internazionale della piattaforma." 
                            </span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-star-fill task-icon"></i>
                            <span class="task-text">"Dark mode: leggibilità migliorata, design moderno e comfort visivo, ideale per ambienti con poca luce."</span>
                        </div>
                        <div class="task-item">
                            <i class="bi bi-star-fill task-icon"></i>
                            <span class="task-text">"AI per suggerimenti personalizzati, analisi avanzate e un'esperienza di lettura ottimizzata per ogni utente."</span>
                        </div>
                    </div>
                </div>

                <p class="slide-quote">
                    "Il progetto Verbahub rappresenta non solo un traguardo tecnico, ma anche un'importante esperienza di crescita professionale per tutto il team InkCoders. Siamo orgogliosi di aver creato una piattaforma che risponde pienamente alle esigenze del cliente."
                </p>

                <a href="{{ route('about') }}" class="back-to-about">
                    <i class="bi bi-arrow-left"></i> Torna a Chi Siamo
                </a>
            </div>
        </div>
    </section>




    <!-- Slide 8: Ringraziamenti -->
    <section class="slide slide-thanks" id="slide-8">
        <div class="container">
            <div class="thanks-content">
                <h1 class="thanks-title">Grazie!</h1>
                <p class="thanks-subtitle">
                    Grazie per aver seguito la presentazione del nostro progetto Verbahub.
                </p>
                <p class="thanks-subtitle">
                    Realizzato con passione dal team <span class="inkcoders-brand">InkCoders</span>.
                </p>

                <div class="team-members">
                    <div class="team-member">
                        <img src="{{ asset('images/fotoghibli.jpg') }}" alt="Vincenzo Rocca" style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;">
                        <div class="team-member-name">Vincenzo Rocca</div>
                        <div class="team-member-role">Full Stack Developer</div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('images/ritaghibli.jpg') }}" alt="Rita Ferrante" style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;">
                        <div class="team-member-name">Rita Ferrante</div>
                        <div class="team-member-role">Full Stack Developer</div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('images/davidetrello.jpg') }}" alt="Davide Nastri" style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;">
                        <div class="team-member-name">Davide Nastri</div>
                        <div class="team-member-role">Full Stack Developer</div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('images/maddalenamarketing.jpg') }}" alt="Maddalena Gliozzi" style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;">
                        <div class="team-member-name">Maddalena Gliozzi</div>
                        <div class="team-member-role">Full Stack Developer</div>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="back-to-about mt-5">
                    <i class="bi bi-arrow-left"></i> Torna a Chi Siamo
                </a>
            </div>

            <!-- Particelle animate per effetto visivo -->
            <div id="particles-container"></div>
        </div>
    </section>
</x-layout>
