<x-layout>
    <div class="search-page">
        <header class="search-page__header container-fluid p-5 bg-primary-light text-white text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="search-page__title display-1">Risultati per: "{{ $query }}"</h1>
                </div>
            </div>
        </header>
        
        <section class="search-page__content container my-5">
            @if($articles->count() > 0)
                <div class="search-grid row">
                    @foreach ($articles as $article)
                        <div class="search-grid__item col-12 col-md-4 mb-4">
                            <article class="article-card">
                                <div class="article-card__image-container">
                                    <img src="{{ asset('storage/' . $article->image) }}" class="article-card__image" alt="Immagine dell'articolo: {{ $article->title }}">
                                </div>
                                <div class="article-card__content">
                                    <div class="article-card__meta">
                                        <span class="article-card__date">{{ $article->created_at->format('d-m-Y') }}</span>
                                        <a href="{{route('article.byCategory', $article->category->id)}}" class="article-card__category-link">{{ $article->category->name }}</a>
                                        <span class="reading-time"><i class="bi bi-clock"></i> {{$article->reading_time}} min</span>
                                    </div>
                                    <h3 class="article-card__title">
                                        <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                                    </h3>
                                    <p class="article-card__subtitle">{{ $article->subtitle }}</p>
                                    <a href="{{ route('article.show', $article) }}" class="article-card__button">Continua a leggere</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="lead">Nessun articolo trovato per la tua ricerca.</p>
                    </div>
                </div>
            @endif
        </section>
    </div>
</x-layout>