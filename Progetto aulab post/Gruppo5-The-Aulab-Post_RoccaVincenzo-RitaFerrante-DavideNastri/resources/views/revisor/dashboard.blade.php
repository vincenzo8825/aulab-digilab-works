<x-layout>
    <x-slot name="title">Dashboard Revisore</x-slot>
    
    <div class="revisor-dashboard">
        <header class="revisor-dashboard__header container-fluid p-5 bg-secondary-subtle text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="revisor-dashboard__title display-1">Dashboard Revisore</h1>
                </div>
            </div>
        </header>
        
        <!-- Aggiungiamo qui il riepilogo statistico con le icone -->
        <div class="container my-5">
            <div class="admin-stats">
                <div class="admin-stat-card">
                    <i class="bi bi-hourglass-split admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $pending_articles->count() }}</p>
                    <p class="admin-stat-card__label">Articoli da revisionare</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-check-circle-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $accepted_articles->count() }}</p>
                    <p class="admin-stat-card__label">Articoli pubblicati</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-x-circle-fill admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $rejected_articles->count() }}</p>
                    <p class="admin-stat-card__label">Articoli rifiutati</p>
                </div>
                <div class="admin-stat-card">
                    <i class="bi bi-calendar-check admin-stat-card__icon"></i>
                    <p class="admin-stat-card__value">{{ $total_reviews }}</p>
                    <p class="admin-stat-card__label">Revisioni totali</p>
                </div>
            </div>
        </div>
        
        <div class="revisor-dashboard__content container my-5">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <!-- Articoli da revisionare -->
            <div class="revisor-dashboard__section mb-5">
                <h2 class="revisor-dashboard__section-title mb-4">Articoli da revisionare</h2>
                <div class="table-responsive">
                    <table class="revisor-dashboard__table table table-striped table-hover">
                        <thead class="revisor-dashboard__table-header table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Sottotitolo</th>
                                <th scope="col">Autore</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="revisor-dashboard__table-body">
                            @forelse($pending_articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->subtitle }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <div class="revisor-dashboard__actions d-flex">
                                            <a href="{{ route('article.show', $article) }}" class="revisor-dashboard__action-link button-article-read btn btn-sm me-2">Leggi</a>
                                            
                                            <!-- Pulsante Approva -->
                                            <button type="button" class="revisor-dashboard__action-link button-article-accept btn btn-sm me-2 btn-confirm" 
                                                    data-id="{{ $article->id }}" 
                                                    data-action="approve" 
                                                    data-message="Confermi di voler approvare questo articolo?">
                                                <i class="bi bi-check-circle"></i> Approva
                                            </button>
                                            
                                            <div class="confirm-container confirm-container-approve-{{ $article->id }}" style="display: none;">
                                                <span class="confirm-message"></span>
                                                <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm btn-confirm-action">
                                                        <i class="bi bi-check-circle"></i> Conferma
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                                        data-id="{{ $article->id }}" 
                                                        data-action="approve">
                                                    <i class="bi bi-x-circle"></i> Annulla
                                                </button>
                                            </div>
                                            
                                            <!-- Pulsante Rifiuta -->
                                            <button type="button" class="revisor-dashboard__action-link button-article-reject btn btn-sm btn-confirm" 
                                                    data-id="{{ $article->id }}" 
                                                    data-action="reject" 
                                                    data-message="Confermi di voler rifiutare questo articolo?">
                                                <i class="bi bi-x-circle"></i> Rifiuta
                                            </button>
                                            
                                            <div class="confirm-container confirm-container-reject-{{ $article->id }}" style="display: none;">
                                                <span class="confirm-message"></span>
                                                <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-confirm-action">
                                                        <i class="bi bi-x-circle"></i> Conferma
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                                        data-id="{{ $article->id }}" 
                                                        data-action="reject">
                                                    <i class="bi bi-x-circle"></i> Annulla
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Non ci sono articoli da revisionare</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Articoli pubblicati -->
            <div class="revisor-dashboard__section mb-5">
                <h2 class="revisor-dashboard__section-title mb-4">Articoli pubblicati</h2>
                <div class="table-responsive">
                    <table class="revisor-dashboard__table table table-striped table-hover">
                        <thead class="revisor-dashboard__table-header table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Sottotitolo</th>
                                <th scope="col">Autore</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="revisor-dashboard__table-body">
                            @forelse($accepted_articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->subtitle }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <!-- Modifica nella sezione degli articoli pubblicati (circa linea 90) -->
                                        <div class="revisor-dashboard__actions d-flex">
                                            <a href="{{ route('article.show', $article) }}" class="revisor-dashboard__action-link 
                                           button-article-read btn btn-sm me-2">Leggi</a>
                                            
                                            <!-- Pulsante Rimetti in revisione -->
                                            <button type="button" class="revisor-dashboard__action-link btn button-article-accept btn-sm btn-confirm" 
                                                    data-id="{{ $article->id }}" 
                                                    data-action="undo" 
                                                    data-message="Confermi di voler rimettere in revisione questo articolo?">
                                                <i class="bi bi-arrow-counterclockwise"></i> Rimetti in revisione
                                            </button>
                                            
                                            <!-- Modifica nella sezione degli articoli pubblicati -->
                                            <div class="confirm-container confirm-container-undo-{{ $article->id }}" style="display: none;">
                                                <span class="confirm-message"></span>
                                                <form action="{{ route('revisor.revertToReview', $article) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn button-article-confirm btn-sm btn-confirm-action">
                                                        <i class="bi bi-arrow-counterclockwise"></i> Conferma
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                                        data-id="{{ $article->id }}" 
                                                        data-action="undo">
                                                    <i class="bi bi-x-circle"></i> Annulla
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Non ci sono articoli pubblicati</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Articoli rifiutati -->
            <div class="revisor-dashboard__section">
                <h2 class="revisor-dashboard__section-title mb-4">Articoli rifiutati</h2>
                <div class="table-responsive">
                    <table class="revisor-dashboard__table table table-striped table-hover">
                        <thead class="revisor-dashboard__table-header table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Sottotitolo</th>
                                <th scope="col">Autore</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="revisor-dashboard__table-body">
                            @forelse($rejected_articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->subtitle }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <!-- Modifica nella sezione degli articoli rifiutati (circa linea 130) -->
                                        <div class="revisor-dashboard__actions d-flex">
                                            <a href="{{ route('article.show', $article) }}" class="revisor-dashboard__action-link btn button-article-read btn-sm me-2">Leggi</a>
                                            
                                            <!-- Pulsante Approva -->
                                            <button type="button" class="revisor-dashboard__action-link btn button-article-accept btn-sm btn-confirm" 
                                                    data-id="{{ $article->id }}" 
                                                    data-action="approve-rejected" 
                                                    data-message="Confermi di voler approvare questo articolo?">
                                                <i class="bi bi-check-circle"></i> Approva
                                            </button>
                                            
                                            <div class="confirm-container confirm-container-approve-rejected-{{ $article->id }}" style="display: none;">
                                                <span class="confirm-message"></span>
                                                <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm btn-confirm-action">
                                                        <i class="bi bi-check-circle"></i> Conferma
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                                        data-id="{{ $article->id }}" 
                                                        data-action="approve-rejected">
                                                    <i class="bi bi-x-circle"></i> Annulla
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Non ci sono articoli rifiutati</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<!-- Per gli articoli pubblicati, quando vuoi rimetterli in revisione -->
<form action="{{ route('revisor.revertToReview', $article) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="button" class="btn btn-warning btn-sm btn-confirm" 
            data-id="{{ $article->id }}" 
            data-action="revert-to-review" 
            data-message="Confermi di voler rimettere questo articolo in revisione?">
        <i class="bi bi-arrow-repeat"></i> Rimetti in revisione
    </button>
</form>
