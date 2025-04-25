<div>
    <h1 class="text-center my-4">I nostri articoli</h1>
    <main class="container my-3">
        <section class="row justify-content-around">
            @foreach ($articles as $article)
                <article class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h6>
                            <p class="card-text flex-grow-1">{{ Str::limit($article->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @auth
                                    <form action="{{ route('favorites.toggle', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? 'btn-danger' : 'btn-outline-danger' }}">
                                            <i class="bi bi-heart{{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? '-fill' : '' }}"></i>
                                            {{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? 'Rimuovi' : 'Preferiti' }}
                                        </button>
                                    </form>
                                    
                                    <a href="{{ route('article_show', $article) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-chat-text"></i> Recensisci
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary w-100">Accedi per interagire</a>
                                @endauth
                            </div>
                            
                            <div class="d-flex justify-content-between border-top pt-2">
                                <small class="text-muted">
                                    <i class="bi bi-heart-fill text-danger"></i> {{ $article->favoritedBy->count() }}
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-chat-text"></i> {{ $article->reviews->count() }} recensioni
                                </small>
                            </div>
                            
                            @can('update', $article)
                                <div class="mt-3 border-top pt-3">
                                    <livewire:article-update-form :$article />
                                </div>
                            @endcan
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </main>
</div>
