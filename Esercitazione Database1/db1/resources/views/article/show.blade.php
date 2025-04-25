<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card shadow">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Immagine articolo" class="card-img-top">
                    @endif

                    <div class="card-body">
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <h5 class="card-subtitle mb-3 text-muted">{{ $article->subtitle }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                        <a href="{{ route('homepage') }}" class="btn btn-outline-dark">Torna alla home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
