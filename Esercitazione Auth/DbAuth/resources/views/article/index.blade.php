<x-layout>
    <div class="container-fluid vh-100 bg-dark">
        <div class="row justify-content-center h-25 align-items-center">
            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="display-4 py-3 text-center text-white">
                    Tutti i nostri articoli
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

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 text-white d-flex justify-content-center mb-3">
                    <div class="card" style="width: 18rem;">
                        @if ($article->img)
                            <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="{{ $article->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <a href="{{ route('profile', ['user' => $article->user->id]) }}" class="text-muted">
                                {{ $article->user->name }}
                            </a>

                            <p class="mt-2">
                                Categorie:
                                @foreach ($article->categories as $category)
                                    <a href="{{ route('category.articles', ['category' => $category->id]) }}" class="badge bg-primary">{{ $category->name }}</a>
                                @endforeach
                            </p>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('article.show', $article) }}" class="btn btn-dark">view</a>
                            @auth
                                @if (Auth::user()->id == $article->user_id)
                                    <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Modifica</a>
                                    <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form-delete-{{ $article->id }}').submit();">
                                        delete
                                    </a>
                                    <form id="form-delete-{{ $article->id }}" action="{{ route('article.delete', $article) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
