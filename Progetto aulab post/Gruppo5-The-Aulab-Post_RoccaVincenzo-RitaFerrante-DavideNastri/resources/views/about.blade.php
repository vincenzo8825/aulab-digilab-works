<x-layout>
   

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container about-hero-content text-center">
            <h1 class="about-hero-title">Chi Siamo</h1>
            <p class="about-hero-subtitle">Alla scoperta degli <span class="inkcoders-brand">InkCoders</span> e del progetto VerbaHub</p>
        </div>
    </section>

    <a href="{{ route('presentazione') }}" class="project-journey-btn">
        <i class="bi bi-journal-text"></i> Il nostro percorso
    </a>

    <div class="container">
        <section class="about-section">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="about-title">La Nostra Storia</h2>
                    <p class="about-text">
                        VerbaHub è nato dalla passione e dalla creatività degli <span class="inkcoders-brand">InkCoders</span>, un team di sviluppatori
                        che ha unito le proprie competenze per creare una piattaforma di informazione innovativa e accessibile.
                    </p>
                    <p class="about-text">
                        Fondato nel 2025, il nostro progetto è cresciuto da un'idea condivisa durante il corso di programmazione
                        presso Aulab, dove abbiamo deciso di trasformare la nostra passione per la tecnologia e la comunicazione in un
                        portale informativo all'avanguardia.
                    </p>
                </div>
                <div class="col-lg-6">
                    <h2 class="about-title">Il Significato dei Nostri Nomi</h2>
                    <p class="about-text">
                        <span class="inkcoders-brand">InkCoders</span> rappresenta la nostra duplice anima: la scrittura digitale ("Ink") e lo sviluppo software ("Coders"),
                        simboleggiando la perfetta fusione tra contenuti di qualità e tecnologia avanzata.
                    </p>
                    <p class="about-text">
                        <strong>VerbaHub</strong> deriva dal latino "verba" (parole) e dall'inglese "hub" (centro di connessione). Rappresenta la nostra missione:
                        essere un punto centrale dove le parole si connettono, creando un ecosistema informativo ricco e diversificato,
                        dove ogni articolo è un nodo di una rete più ampia di conoscenza.
                    </p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="about-section">
            <h2 class="about-title">Cosa Offriamo</h2>
            <p class="about-text">
                VerbaHub è una piattaforma editoriale moderna che combina giornalismo di qualità con tecnologie all'avanguardia.
            </p>

            <div class="feature-cards">
                <div class="feature-card">
                    <div class="feature-card-header">
                        <div class="feature-card-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h3 class="feature-card-title">Contenuti di Qualità</h3>
                        <p class="feature-card-subtitle">Articoli curati e verificati</p>
                    </div>
                    <div class="feature-card-body">
                        <p class="feature-card-text">
                            Selezioniamo con cura ogni articolo pubblicato su VerbaHub, garantendo contenuti originali, informativi e coinvolgenti. I nostri autori sono esperti nei rispettivi campi e seguono rigorosi standard editoriali per offrire ai lettori informazioni accurate e approfondite.
                        </p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-card-header">
                        <div class="feature-card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="feature-card-title">Community Attiva</h3>
                        <p class="feature-card-subtitle">Interazione e partecipazione</p>
                    </div>
                    <div class="feature-card-body">
                        <p class="feature-card-text">
                            VerbaHub non è solo una piattaforma di lettura, ma uno spazio di condivisione e dialogo. Incoraggiamo la partecipazione attiva dei lettori attraverso commenti, suggerimenti e contributi, creando una comunità vivace dove le idee possono circolare liberamente e arricchirsi a vicenda.
                        </p>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="feature-card-header">
                        <div class="feature-card-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="feature-card-title">Affidabilità</h3>
                        <p class="feature-card-subtitle">Informazione verificata</p>
                    </div>
                    <div class="feature-card-body">
                        <p class="feature-card-text">
                            Ogni articolo pubblicato su VerbaHub passa attraverso un rigoroso processo di revisione per garantire l'accuratezza delle informazioni. I nostri redattori esperti verificano fonti e dati, assicurando contenuti affidabili e di alta qualità.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="quote-section">
            <div class="container text-center">
                <p class="quote-text">
                    "La nostra missione è trasformare il modo in cui le persone accedono all'informazione, creando un ecosistema digitale dove qualità, affidabilità e innovazione si incontrano per offrire un'esperienza di lettura senza precedenti."
                </p>
                <p class="quote-author">— Team InkCoders</p>
            </div>
        </section>

        <!-- Team Section -->
        <section class="about-section">
            <h2 class="about-title">Il Team <span class="inkcoders-brand">InkCoders</span></h2>
            <p class="about-text">
                Dietro VerbaHub c'è un team di professionisti appassionati che mettono a disposizione le loro competenze per creare un'esperienza unica.
            </p>

            <div class="unique-team-container">
                <div class="unique-team-row">
                    <!-- Team Member 1 -->
                    <div class="unique-card">
                        <div class="unique-card-inner">
                            <div class="unique-card-face unique-card-front">
                                <div class="unique-card-shape" style="background-image: url('{{ asset('images/fotoghibli.jpg') }}');"></div>
                                <div class="unique-card-shape-overlay"></div>
                                <div class="unique-card-icon">
                                    <i class="bi bi-code-slash"></i>
                                </div>
                                <div class="unique-card-content">
                                    <h3 class="unique-card-name">Vincenzo Rocca</h3>
                                    <p class="unique-card-role">Full Stack Developer</p>
                                </div>
                                <div class="unique-card-decoration">
                                    <i class="bi bi-braces"></i>
                                </div>
                            </div>
                            <div class="unique-card-face unique-card-back">
                                <div class="unique-card-back-decoration">
                                    <i class="bi bi-code-square"></i>
                                </div>
                                <div class="unique-card-back-content">
                                    <h3 class="unique-card-back-title">Vincenzo Rocca</h3>
                                    <p class="unique-card-back-text">
                                        Esperto di backend e custode del caos del codice, il capoprogetto guida il team con ironia e affidabilità.
                                    </p>
                                    <div class="unique-card-skills">
                                        <span class="unique-skill-tag">Laravel</span>
                                        <span class="unique-skill-tag">JavaScript</span>
                                        <span class="unique-skill-tag">PHP</span>
                                    </div>
                                    <div class="unique-card-social">
                                        <a href="#" class="unique-social-link"><i class="bi bi-github"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="unique-card">
                        <div class="unique-card-inner">
                            <div class="unique-card-face unique-card-front">
                                <div class="unique-card-shape" style="background-image: url('{{ asset('images/ritaghibli.jpg') }}');"></div>
                                <div class="unique-card-shape-overlay"></div>
                                <div class="unique-card-icon">
                                    <i class="bi bi-palette"></i>
                                </div>
                                <div class="unique-card-content">
                                    <h3 class="unique-card-name">Rita Ferrante</h3>
                                    <p class="unique-card-role">Full stack developer</p>
                                </div>
                                <div class="unique-card-decoration">
                                    <i class="bi bi-brush"></i>
                                </div>
                            </div>
                            <div class="unique-card-face unique-card-back">
                                <div class="unique-card-back-decoration">
                                    <i class="bi bi-layout-text-window"></i>
                                </div>
                                <div class="unique-card-back-content">
                                    <h3 class="unique-card-back-title">Rita Ferrante</h3>
                                    <p class="unique-card-back-text">
                                        Maestra del codice a tutto tondo, domina frontend e backend con la stessa disinvoltura con cui risolve bug... e corregge il lavoro degli altri!
                                    </p>
                                    <div class="unique-card-skills">
                                        <span class="unique-skill-tag">UI/UX</span>
                                        <span class="unique-skill-tag">CSS</span>
                                        <span class="unique-skill-tag">Bootstrap</span>
                                    </div>
                                    <div class="unique-card-social">
                                        <a href="#" class="unique-social-link"><i class="bi bi-github"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="unique-card">
                        <div class="unique-card-inner">
                            <div class="unique-card-face unique-card-front">
                                <div class="unique-card-shape" style="background-image: url('{{ asset('images/davidetrello.jpg') }}');"></div>
                                <div class="unique-card-shape-overlay"></div>
                                <div class="unique-card-icon">
                                    <i class="bi bi-database"></i>
                                </div>
                                <div class="unique-card-content">
                                    <h3 class="unique-card-name">Davide Nastri</h3>
                                    <p class="unique-card-role">Full stack developer</p>
                                </div>
                                <div class="unique-card-decoration">
                                    <i class="bi bi-server"></i>
                                </div>
                            </div>
                            <div class="unique-card-face unique-card-back">
                                <div class="unique-card-back-decoration">
                                    <i class="bi bi-hdd-network"></i>
                                </div>
                                <div class="unique-card-back-content">
                                    <h3 class="unique-card-back-title">Davide Nastri</h3>
                                    <p class="unique-card-back-text">
                                        "Detto Davide Trello, il re dell'organizzazione.Maghetto del design, trasforma codici in opere d'arte e ogni pixel nel posto giusto." 
                                    </p>
                                    <div class="unique-card-skills">
                                        <span class="unique-skill-tag">PHP</span>
                                        <span class="unique-skill-tag">Database</span>
                                        <span class="unique-skill-tag">Design</span>
                                    </div>
                                    <div class="unique-card-social">
                                        <a href="#" class="unique-social-link"><i class="bi bi-github"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="unique-card">
                        <div class="unique-card-inner">
                            <div class="unique-card-face unique-card-front">
                                <div class="unique-card-shape" style="background-image: url('{{ asset('images/maddalenamarketing.jpg') }}');"></div>
                                <div class="unique-card-shape-overlay"></div>
                                <div class="unique-card-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                                <div class="unique-card-content">
                                    <h3 class="unique-card-name">Maddalena Gliozzi</h3>
                                    <p class="unique-card-role">Full stack developer</p>
                                </div>
                                <div class="unique-card-decoration">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                            </div>
                            <div class="unique-card-face unique-card-back">
                                <div class="unique-card-back-decoration">
                                    <i class="bi bi-journal-richtext"></i>
                                </div>
                                <div class="unique-card-back-content">
                                    <h3 class="unique-card-back-title">Maddalena Gliozzi</h3>
                                    <p class="unique-card-back-text">
                                        Responsabile marketing. Stratega del codice e delle idee, trasforma campagne in successi e clienti indecisi in fan sfegatati... tutto con un sorriso impeccabile!
                                    </p>
                                    <div class="unique-card-skills">
                                        <span class="unique-skill-tag">HTML/CSS</span>
                                        <span class="unique-skill-tag">Content</span>
                                        <span class="unique-skill-tag">Marketing</span>
                                    </div>
                                    <div class="unique-card-social">
                                        <a href="#" class="unique-social-link"><i class="bi bi-github"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="unique-social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
