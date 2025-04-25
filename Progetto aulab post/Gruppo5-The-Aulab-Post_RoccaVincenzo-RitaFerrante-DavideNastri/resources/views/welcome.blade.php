<x-layout body-class="is-homepage">
    <div class="home-page">
        <!-- Hero Section -->
        <header class="home-page__hero">
            <div class="container-fluid p-0">
                <div class="row g-0 h-100">
                    <!-- Modificato per invertire l'ordine su mobile -->
                    <div class="col-md-6 order-md-1 order-2 home-page__hero-content">
                        <div class="hero-content-wrapper">
                            <div class="logo-container">
                                <img src="{{asset('images/logoTestogrande.png')}}" class="home-page__hero-logo animate__animated animate__fadeInRight">
                            </div>
                            <h1 class="hero-tagline berkshire-swash-regular">Il crocevia delle parole,<br>dove nascono le storie.</h1>
                            <p class="home-page__hero-text lato-regular-italic">
                                "Un portale dedicato alla conoscenza e all'informazione, dove caricare e scoprire articoli, garantendo veridicità attraverso un avanzato sistema di fact-checking."
                            </p>

                            <!-- Icone  -->
                            {{-- <div class="category-icons">
                                @foreach ($categories->take(5) as $category)
                                <a href="{{ route('article.byCategory', $category->id) }}" class="category-icon">
                                    <div class="category-icon__circle">
                                        <i class="bi bi-{{ strtolower($category->name) == 'tech' ? 'robot' :
                                            (strtolower($category->name) == 'technology' ? 'cpu' :
                                            (strtolower($category->name) == 'politica' ? 'flag' :
                                            (strtolower($category->name) == 'economia' ? 'graph-up' :
                                            (strtolower($category->name) == 'sport' ? 'trophy' :
                                            (strtolower($category->name) == 'cultura' ? 'book' :
                                            'tag'))))) }}"></i>
                                    </div>
                                    <span class="category-icon__name">{{ $category->name }}</span>
                                </a>
                                @endforeach
                            </div> --}}

                            <div class="home-page__hero-search">
                                <form action="{{ route('article.search') }}" method="GET" class="d-flex">
                                    <input class="form-control me-2" type="search" name="query" placeholder="Cerca gli articoli..." aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit">Cerca</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-2 order-1 p-0 overflow-hidden position-relative hero-image-wrapper">
                        <div class="hero-image-container h-100 w-100">
                            <img src="{{ asset('images/sfondohero.jpg') }}" alt="Persone che collaborano" class="hero-image active">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Indicatore di scorrimento -->
            <a href="#categories-section" class="scroll-indicator">
                <span class="scroll-indicator__text">Scorri</span>
                <i class="bi bi-chevron-down scroll-indicator__icon"></i>
            </a>
        </header>

        <!-- Services Section -->
        <section id="categories-section" class="home-page__services">
            <div class="container">
                <h2 class="home-page__section-title">Categorie</h2>
                <p class="home-page__section-subtitle">Esplora vasta gamma di argomenti e trova i contenuti di tuo interesse.</p>

                <div class="row">
                    @foreach ($categories->take(6) as $category)
                    <div class="col-md-4 mb-4">
                        <div class="home-page__service-card">
                            <div class="home-page__service-icon home-page__service-icon--{{ ['orange', 'green', 'pink', 'blue', 'purple', 'yellow'][($loop->index % 6)] }}">
                                <i class="bi bi-{{ strtolower($category->name) == 'tech' ? 'robot' :
                                    (strtolower($category->name) == 'technology' ? 'cpu' :
                                    ['bank2', 'graph-up', 'basket2', 'bicycle', 'controller', 'robot'][$loop->index % 6]) }}"></i>
                            </div>
                            <h3 class="home-page__service-title">{{ $category->name }}</h3>
                            <p class="home-page__service-text">Esplora articoli di {{ $category->name }} e scopri nuovi aggiornamenti sull'argomento</p>
                            <a href="{{ route('article.byCategory', $category->id) }}" class="home-page__service-link">Vedi Articoli <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="home-page__blog">
            <div class="container">
                <h2 class="home-page__section-title">Post Recenti</h2>
                <p class="home-page__section-subtitle">Resta aggiornato con i nostri ultimi articoli</p>

                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-3 mb-4">
                        <div class="home-page__blog-card">
                            <div class="home-page__blog-image">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="home-page__blog-img" loading="lazy" width="300" height="200">
                            </div>
                            <div class="home-page__blog-content">
                                <div class="home-page__blog-meta">
                                    <span class="home-page__blog-date">{{ $article->created_at->format('d M, Y') }}</span>
                                    <span class="home-page__blog-author">| {{ $article->user->name }}</span>
                                </div>
                                <h3 class="home-page__blog-title">{{ $article->title }}</h3>
                                <p class="home-page__blog-excerpt">{{ Str::limit($article->subtitle, 100) }}</p>
                                <div class="home-page__blog-footer">
                                    <a href="{{ route('article.show', $article) }}" class="home-page__blog-link">Leggi di più <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layout>
