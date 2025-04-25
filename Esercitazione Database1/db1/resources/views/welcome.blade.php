<x-layout>
    <div class="container">
        <h1 class="text-center py-5">Articoli</h1>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Immagine articolo" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-3 text-muted">{{ $article->subtitle }}</h6>
                            <p class="card-text">{{ Str::limit($article->body, 100) }}</p>
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Leggi di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
