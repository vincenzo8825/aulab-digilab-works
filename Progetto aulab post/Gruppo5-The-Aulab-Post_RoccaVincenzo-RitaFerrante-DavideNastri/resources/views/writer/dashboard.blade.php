<x-layout>
    <div class="writer-dashboard">
        <header class="writer-dashboard__header container-fluid p-5 text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="writer-dashboard__title display-1">Benvenuto, Redattore {{Auth::user()->name}}</h1>
                </div>
            </div>
        </header>

        @if (session('message'))
            <div class="writer-dashboard__alert alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session('error'))
            <div class="writer-dashboard__alert alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Writer Stats Section -->
        <div class="container my-5">
            <div class="admin-stats">
                <div class="admin-stat-card">
                    <i class="bi bi-file-earmark-text admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $pendingArticles->count() + $acceptedArticles->count() + $rejectedArticles->count() }}</p>
                    <p class="admin-stat-card__label">Articoli totali</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-hourglass-split admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $pendingArticles->count() }}</p>
                    <p class="admin-stat-card__label">In revisione</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-check-circle-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $acceptedArticles->count() }}</p>
                    <p class="admin-stat-card__label">Pubblicati</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-x-circle-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $rejectedArticles->count() }}</p>
                    <p class="admin-stat-card__label">Rifiutati</p>
                </div>
            </div>
        </div>

        <section class="writer-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="writer-dashboard__section-title">I tuoi articoli in revisione</h2>
                    <div class="writer-dashboard__table-container">
                        <x-writer-articles-table :articles="$pendingArticles" status="pending"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="writer-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="writer-dashboard__section-title">I tuoi articoli pubblicati</h2>
                    <div class="writer-dashboard__table-container">
                        <x-writer-articles-table :articles="$acceptedArticles" status="accepted"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="writer-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="writer-dashboard__section-title">I tuoi articoli rifiutati</h2>
                    <div class="writer-dashboard__table-container">
                        <x-writer-articles-table :articles="$rejectedArticles" status="rejected"/>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sezione Strumenti Redattore -->
        <section class="container my-5">
            <h2 class="writer-dashboard__section-title mb-4">Strumenti di Redazione</h2>
            <div class="admin-content-management">
                <div class="admin-content-card">
                    <div class="card-header">
                        <i class="bi bi-pencil-square"></i> Gestione Articoli
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('article.create') }}">
                                    <i class="bi bi-plus-circle"></i> Crea nuovo articolo
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">
                                    <i class="bi bi-card-text"></i> Bozze salvate
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="admin-content-card">
                    <div class="card-header">
                        <i class="bi bi-book"></i> Risorse Editoriali
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="#">
                                    <i class="bi bi-journal-text"></i> Linee guida di scrittura
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">
                                    <i class="bi bi-image"></i> Galleria immagini
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
