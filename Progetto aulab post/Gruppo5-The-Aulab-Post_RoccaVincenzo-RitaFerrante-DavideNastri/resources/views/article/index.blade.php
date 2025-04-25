<x-layout>
    <x-slot name=title>Indice</x-slot>

    <div class="articles-page">
        <!-- Header Banner -->
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">Articoli</h1>
                <div class="breadcrumb">
                    <a href="{{ route('homepage') }}">Home</a> / Articoli
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <!-- Articoli -->
                <div class="col-lg-8">
                    <!-- Mostra risultati di ricerca se c'è una query -->
                    @if(isset($query))
                        <div class="alert alert-info mb-4">
                            Risultati di ricerca per: "{{ $query }}"
                            <div class="mt-2">
                                <a href="{{ route('article.index') }}" class="btn btn-bg-primary-light text-white">
                                    <i class="bi bi-arrow-left"></i> Torna a tutti gli articoli
                                </a>
                            </div>
                        </div>
                    @endif
                    
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-md-6 mb-4">
                                <!-- Card dell'articolo -->
                                <div class="article-card">
                                    <div class="article-card__image-container">
                                        <a href="{{ route('article.show', $article) }}">
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}" class="article-card__image" alt="{{ $article->title }}">
                                        </a>
                                        <div class="article-card__category">
                                            <a href="{{ route('article.byCategory', $article->category) }}">{{ $article->category->name }}</a>
                                        </div>
                                    </div>
                                    <div class="article-card__content">
                                        <h3 class="article-card__title">
                                            <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                                        </h3>
                                        <p class="article-card__excerpt">{{ Str::limit($article->subtitle, 100) }}</p>
                                        <div class="article-card__meta">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="article-meta-author me-3 mb-1">
                                                    <i class="bi bi-person"></i>
                                                    <a href="{{ route('article.byAuthor', $article->user) }}">{{ $article->user->name }}</a>
                                                </div>
                                                <div class="reading-time me-3 mb-1">
                                                    <i class="bi bi-clock"></i> {{$article->reading_time}} min
                                                </div>
                                                <div class="article-card__date mb-1">
                                                    <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginazione -->
                    <div class="pagination-container">
                        <div class="custom-pagination">
                            @if($articles->onFirstPage())
                                <span class="pagination-btn disabled">Precedente</span>
                            @else
                                <a href="{{ $articles->previousPageUrl() }}" class="pagination-btn">Precedente</a>
                            @endif
                            
                            <div class="pagination-info">
                                Pagina {{ $articles->currentPage() }} di {{ $articles->lastPage() }}
                            </div>
                            
                            @if($articles->hasMorePages())
                                <a href="{{ $articles->nextPageUrl() }}" class="pagination-btn">Successivo</a>
                            @else
                                <span class="pagination-btn disabled">Successivo</span>
                            @endif
                        </div>
                    </div>

                    <!-- Rimuoviamo le informazioni sulla paginazione separate -->
                    @if($articles->hasPages())
                    <div class="pagination-info">
                        Mostrando {{ $articles->firstItem() }} - {{ $articles->lastItem() }} di {{ $articles->total() }} articoli
                        (Pagina {{ $articles->currentPage() }} di {{ $articles->lastPage() }})
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search Box -->
                    <!-- Nella sidebar, aggiorna il form di ricerca -->
                    <div class="sidebar-widget search-widget mb-4">
                        <h4 class="sidebar-widget__title">Cerca</h4>
                        <form action="{{ route('article.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Cerca articoli...">
                                <button class="btn btn-bg-primary-light text-white" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget categories-widget mb-4">
                        <h4 class="sidebar-widget__title">Categorie</h4>
                        <ul class="categories-list">
                            @php
                                $categories = \App\Models\Category::withCount(['articles' => function($query) {
                                    $query->where('is_accepted', true);
                                }])->get();
                            @endphp
                            @foreach($categories as $category)
                                <li class="categories-list__item">
                                    <a href="{{ route('article.byCategory', $category) }}" class="d-flex justify-content-between">
                                        <span>{{ $category->name }}</span>
                                        <span class="categories-list__count">({{ $category->articles_count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="sidebar-widget recent-posts-widget mb-4">
                        <h4 class="sidebar-widget__title">Post Recenti</h4>
                        <div class="recent-posts">
                            @php
                                $recentArticles = \App\Models\Article::where('is_accepted', true)
                                    ->orderBy('created_at', 'desc')
                                    ->take(3)
                                    ->get();
                            @endphp
                            @foreach($recentArticles as $recentArticle)
                                <div class="recent-post">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <a href="{{ route('article.show', $recentArticle) }}">
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $recentArticle->image)) }}" class="recent-post__image" alt="{{ $recentArticle->title }}" loading="lazy" width="100" height="70">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="recent-post__content ps-3">
                                                <h5 class="recent-post__title">
                                                    <a href="{{ route('article.show', $recentArticle) }}">{{ Str::limit($recentArticle->title, 40) }}</a>
                                                </h5>
                                                <p class="recent-post__date">{{ $recentArticle->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="sidebar-widget tags-widget">
                        <h4 class="sidebar-widget__title">Tags</h4>
                        <div class="tags-cloud">
                            @php
                                $tags = \App\Models\Tag::withCount(['articles' => function($query) {
                                    $query->where('is_accepted', true);
                                }])->get();
                            @endphp
                            @foreach($tags as $tag)
                                <a href="{{ route('article.byTag', $tag) }}" class="tag-link">
                                    {{ $tag->name }} <span class="tag-count">({{ $tag->articles_count }})</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

