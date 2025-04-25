<x-layout>
    <div class="admin-dashboard">
        <header class="admin-dashboard__header container-fluid p-5 text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="admin-dashboard__title display-1">Benvenuto, Amministratore {{Auth::user()->name}}</h1>
                </div>
            </div>
        </header>
        
        @if (session('message'))
            <div class="admin-dashboard__alert alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        
        <!-- Admin Stats Section -->
        <div class="container my-5">
            <div class="admin-stats">
                <div class="admin-stat-card">
                    <i class="bi bi-people-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $adminRequests->count() + $revisorRequests->count() + $writerRequests->count() }}</p>
                    <p class="admin-stat-card__label">Richieste totali</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-shield-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $adminRequests->count() }}</p>
                    <p class="admin-stat-card__label">Richieste admin</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-check-circle-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $revisorRequests->count() }}</p>
                    <p class="admin-stat-card__label">Richieste revisore</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-pencil-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $writerRequests->count() }}</p>
                    <p class="admin-stat-card__label">Richieste redattore</p>
                </div>
            </div>
        </div>
        
        <section class="admin-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="admin-dashboard__section-title">Richieste per il ruolo di amministratore</h2>
                    </div>
                    <div class="admin-dashboard__table-container">
                        <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="admin-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="admin-dashboard__section-title">Richieste per il ruolo di revisore</h2>
                        
                    </div>
                    <div class="admin-dashboard__table-container">
                        <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="admin-dashboard__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="admin-dashboard__section-title">Richieste per il ruolo di redattore</h2>
                        
                        <!-- Removed the "Rifiuta tutte le richieste" button -->
                    </div>
                    <div class="admin-dashboard__table-container">
                        <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Sezione Gestione Contenuti -->
        <section class="container my-5">
            <h2 class="admin-dashboard__section-title mb-4">Gestione Contenuti</h2>
            <div class="admin-content-management">
                <div class="admin-content-card">
                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-folder"></i> Gestione Categorie
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('admin.categories.index') }}" class="text-primary">
                                    <i class="bi bi-list-ul"></i> Visualizza tutte le categorie
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('admin.categories.create') }}" class="text-accent">
                                    <i class="bi bi-plus-circle"></i> Crea nuova categoria
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="admin-content-card">
                    <div class="card-header bg-accent text-white">
                        <i class="bi bi-tags"></i> Gestione Tag
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('admin.tags.index') }}" class="text-primary">
                                    <i class="bi bi-list-ul"></i> Visualizza tutti i tag
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('admin.tags.create') }}" class="text-accent">
                                    <i class="bi bi-plus-circle"></i> Crea nuovo tag
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="admin-content-card">
                    <div class="card-header bg-primary-light text-white">
                        <i class="bi bi-file-earmark-text"></i> Gestione Articoli
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('article.index') }}" class="text-primary">
                                    <i class="bi bi-list-ul"></i> Visualizza tutti gli articoli
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('article.create') }}" class="text-accent">
                                    <i class="bi bi-plus-circle"></i> Crea nuovo articolo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
