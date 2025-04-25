<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-5 display-3 text-white">Crea un articolo</h1>
            </div>
        </div>

        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="{{ route('article.store') }}" method="POST" class="p-4 bg-light rounded shadow-lg" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Inserisci il titolo dell'articolo">
                        @error('title')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="6" placeholder="Scrivi il corpo del tuo articolo">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Immagine -->
                    <div class="mb-4">
                        <label for="img" class="form-label">Aggiungi un'immagine:</label>
                        <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                            <p class="fst-italic text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categorie (Selezione Multipla) -->
                    <div class="mb-4">
                        <label for="categories" class="form-label">Categorie:</label>
                        <select name="categories[]" id="categories" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark btn-lg w-100">Crea Articolo</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
