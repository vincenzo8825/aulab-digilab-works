<x-layout>
    <div class="container-fluid vh-100 bg-dark">
        <div class="row justify-content-center h-25 align-items-center">
            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="display-4 py-3 text-center text-white">
                    Dettaglio articolo: {{$article->title}}
                </h1>

                @if (session('success'))
                    <div class="alert alert-success text-center w-50">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger text-center w-50">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-white d-flex justify-content-center mb-3">
                <div class="card" style="width: 18rem;">
                    @if ($article->img)
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                        <p class="mt-2">
                            Categorie:
                            @foreach ($article->categories as $category)
                                <span class="badge bg-primary">{{ $category->name }}</span>
                            @endforeach
                        </p>
                        <a href="{{ route('article.index') }}" class="btn btn-dark">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="text-white">Altri articoli scritti da {{$article->user->name}}</h3>
            </div>
            @foreach($articleBySameUser as $relatedArticle)
                <div class="col-12 col-md-6 text-white d-flex justify-content-center mb-3">
                    <div class="card" style="width: 18rem;">
                        @if ($relatedArticle->img)
                            <img src="{{ Storage::url($relatedArticle->img) }}" class="card-img-top" alt="{{ $relatedArticle->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedArticle->title }}</h5>
                            <p class="card-text">{{ $relatedArticle->body }}</p>
                            <p class="mt-2">
                                Categorie:
                                @foreach ($relatedArticle->categories as $category)
                                    <span class="badge bg-primary">{{ $category->name }}</span>
                                @endforeach
                            </p>
                            <a href="{{ route('article.show', $relatedArticle) }}" class="btn btn-dark">Vedi l'articolo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
