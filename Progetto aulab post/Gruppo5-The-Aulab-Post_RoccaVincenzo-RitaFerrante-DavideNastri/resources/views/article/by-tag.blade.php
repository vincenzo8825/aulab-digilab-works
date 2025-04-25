<x-layout>
    <x-slot name=title>Articoli con tag: {{ $tag->name }}</x-slot>

    <div class="articles-page">
        <!-- Header Banner -->
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">Tag: {{ $tag->name }}</h1>
                <div class="breadcrumb">
                    <a href="{{ route('homepage') }}">Home</a> / <a href="{{ route('article.index') }}">Articoli</a> / Tag: {{ $tag->name }}
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <!-- Articoli -->
                <div class="col-lg-8">
                    @if(isset($query))
                        <div class="alert alert-info mb-4">
                            Risultati di ricerca per: "{{ $query }}" con tag {{ $tag->name }}
                            <div class="mt-2">
                                <a href="{{ route('article.byTag', $tag) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-arrow-left"></i> Torna a tutti gli articoli con tag {{ $tag->name }}
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
                                            <div class="article-card__author">
                                                {{-- <img src="https://via.placeholder.com/40" class="rounded-circle" alt="{{ $article->user->name }}"> --}}
                                                <a href="{{ route('article.byAuthor', $article->user) }}">{{ $article->user->name }}</a>
                                            </div>
                                            <div class="article-card__date">{{ $article->created_at->format('M d, Y') }}</div>
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

                    <!-- Informazioni sulla paginazione -->
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
                    <div class="sidebar-widget search-widget mb-4">
                        <h4 class="sidebar-widget__title">Search</h4>
                        <form action="{{ route('article.byTag', $tag) }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Search in tag {{ $tag->name }}...">
                                <button class="btn btn-bg-primary-light text-white" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget categories-widget mb-4">
                        <h4 class="sidebar-widget__title">Categories</h4>
                        <ul class="categories-list">
                            @foreach($allCategories as $category)
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
                        <h4 class="sidebar-widget__title">Popular Posts</h4>
                        <div class="recent-posts">
                            @foreach($popularArticles as $popularArticle)
                                <div class="recent-post">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <a href="{{ route('article.show', $popularArticle) }}">
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $popularArticle->image)) }}" class="recent-post__image" alt="{{ $popularArticle->title }}">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="recent-post__content ps-3">
                                                <h5 class="recent-post__title">
                                                    <a href="{{ route('article.show', $popularArticle) }}">{{ Str::limit($popularArticle->title, 40) }}</a>
                                                </h5>
                                                <p class="recent-post__date">{{ $popularArticle->created_at->format('M d, Y') }}</p>
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
                            @foreach($tags as $t)
                                <a href="{{ route('article.byTag', $t) }}" class="tag-link {{ $t->id == $tag->id ? 'active' : '' }}">
                                    {{ $t->name }} <span class="tag-count">({{ $t->articles_count }})</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>