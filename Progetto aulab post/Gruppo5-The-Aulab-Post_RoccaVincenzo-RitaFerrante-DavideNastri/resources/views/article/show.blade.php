<x-layout>
    <x-slot name=title>{{ $article->title }}</x-slot>

    <!-- Aggiungi i metadati per i tags -->
    @section('meta')
        <meta name="keywords" content="{{ $article->tags->pluck('name')->join(', ') }}">
    @endsection

    <div class="articles-page">
        <!-- Header Banner -->
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">{{ $article->title }}</h1>
                <div class="breadcrumb">
                    <a href="{{ route('homepage') }}">Home</a> /
                    <a href="{{ route('article.index') }}">Articoli</a> /
                    <a href="{{ route('article.byCategory', $article->category) }}">{{ $article->category->name }}</a> /
                    {{ Str::limit($article->title, 30) }}
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <!-- Contenuto Articolo -->
                <div class="col-lg-8">
                    <article class="article-full">
                        <!-- Immagine dell'articolo -->
                        <div class="article-full__image-container">
                            <img src="{{ asset('storage/' . $article->image) }}" class="article-detail__image" alt="{{ $article->title }}" loading="lazy" width="800" height="450">
                        </div>

                        <div class="article-full__meta">
                            <div class="article-meta-info d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center mb-2 mb-md-0">
                                    <div class="article-meta-category me-3">
                                        <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-primary text-decoration-none">
                                            {{ $article->category->name }}
                                        </a>
                                    </div>
                                    <div class="article-meta-date me-3">
                                        <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d M Y') }}
                                    </div>
                                    <div class="reading-time">
                                        <i class="bi bi-clock"></i> {{$article->reading_time}} min
                                    </div>
                                </div>
                                <div class="article-meta-author">
                                    <i class="bi bi-person"></i>
                                    <a href="{{ route('article.byAuthor', $article->user) }}" class="text-decoration">
                                        {{ $article->user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Titolo e sottotitolo -->
                        <h1 class="article-title">{{ $article->title }}</h1>
                        <h2 class="article-full__subtitle">{{ $article->subtitle }}</h2>

                        <!-- Corpo dell'articolo -->
                        <div class="article-full__body">
                            <div class="article-content">
                                {!! nl2br(e($article->body)) !!}
                            </div>
                        </div>

                        <div class="article-full__tags mb-4">
                            <h4 class="mb-3">Tags:</h4>
                            <div class="tags-cloud">
                                @forelse ($article->tags as $tag)
                                    <a href="{{ route('article.byTag', $tag) }}" class="tag-link">
                                        {{ $tag->name }}
                                    </a>
                                @empty
                                    <span class="text-muted">Nessun tag associato</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="article-full__actions">
                            <a href="{{ route('homepage') }}" class="btn btn-bg-primary-light text-white">
                                <i class="bi bi-arrow-left"></i> Torna alla Home
                            </a>

                            @if(Auth::check() && (Auth::user()->is_admin || (Auth::user()->is_writer && Auth::user()->id == $article->user_id)))
                                @if(Auth::check() && Auth::id() == $article->user_id)
                                    <a href="{{ route('article.edit', $article) }}" class="btn btn-warning ms-2">
                                        <i class="bi bi-pencil"></i> Modifica
                                    </a>
                                @endif
                            @endif
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Resto del codice della sidebar rimane invariato -->
                    <!-- Author Widget -->
                    <div class="sidebar-widget author-widget mb-4">
                        <h4 class="sidebar-widget__title">Autore</h4>
                        <div class="author-profile">
                            <div class="author-profile__image">
                                {{-- <img src="https://via.placeholder.com/100" class="rounded-circle" alt="{{ $article->user->name }}"> --}}
                            </div>
                            <h5 class="author-profile__name">{{ $article->user->name }}</h5>
                            <p class="author-profile__stats">
                                <a href="{{ route('article.byAuthor', $article->user) }}" class="btn btn-sm btn-bg-primary-light text-white">
                                    Vedi tutti gli articoli
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-widget categories-widget mb-4">
                        <h4 class="sidebar-widget__title">Categorie</h4>
                        <ul class="categories-list">
                            @php
                                $allCategories = \App\Models\Category::withCount(['articles' => function($query) {
                                    $query->where('is_accepted', true);
                                }])->get();
                            @endphp
                            @foreach($allCategories as $category)
                                <li class="categories-list__item {{ $category->id == $article->category->id ? 'active' : '' }}">
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
                        <h4 class="sidebar-widget__title">Articoli Correlati</h4>
                        <div class="recent-posts">
                            @php
                                $relatedArticles = \App\Models\Article::where('is_accepted', true)
                                                ->where('category_id', $article->category_id)
                                                ->where('id', '!=', $article->id)
                                                ->orderBy('created_at', 'desc')
                                                ->take(3)
                                                ->get();
                            @endphp
                            @foreach($relatedArticles as $relatedArticle)
                                <div class="recent-post">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <a href="{{ route('article.show', $relatedArticle) }}">
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $relatedArticle->image)) }}" class="recent-post__image" alt="{{ $relatedArticle->title }}">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="recent-post__content ps-3">
                                                <h5 class="recent-post__title">
                                                    <a href="{{ route('article.show', $relatedArticle) }}">{{ Str::limit($relatedArticle->title, 40) }}</a>
                                                </h5>
                                                <p class="recent-post__date">{{ $relatedArticle->created_at->format('M d, Y') }}</p>
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
                                <a href="{{ route('article.byTag', $tag) }}" class="tag-link {{ $article->tags->contains($tag->id) ? 'active' : '' }}">
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

