<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-5 display-3 text-white">Modifica un articolo</h1>
            </div>
        </div>

        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-6">
                <form action="{{ route('article.update', $article) }}" method="POST" class="p-5 bg-light rounded shadow" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $article->title) }}" placeholder="Inserisci il titolo dell'articolo">
                        @error('title')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Corpo del testo -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10" placeholder="Scrivi il corpo del tuo articolo">{{ old('body', $article->body) }}</textarea>
                        @error('body')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Immagine esistente -->
                    @if($article->img)
                        <div class="mb-3">
                            <img class="w-100" src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}">
                        </div>
                    @else
                        <p>Nessuna immagine esistente!</p>
                    @endif

                    <!-- Nuova immagine -->
                    <div class="mb-3">
                        <label for="img" class="form-label">Aggiorna un'immagine:</label>
                        <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categorie -->
                    <div class="mb-4">
                        <label for="categories" class="form-label">Categorie:</label>
                        <select name="categories[]" id="categories" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $article->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bottone di invio -->
                    <div class="text-center">
                        <button class="btn btn-outline-dark" type="submit">
                            Modifica articolo
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
