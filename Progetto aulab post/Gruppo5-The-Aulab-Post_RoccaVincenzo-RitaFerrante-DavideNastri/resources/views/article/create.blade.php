<x-layout>
    <div class="article-create-page">
        <header class="article-create-page__header container-fluid p-5 bg-secondary-subtle text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="article-create-page__title display-4">Crea un nuovo articolo</h1>
                </div>
            </div>
        </header>

        <div class="container mt-4">
            @if (session('message'))
                <div class="admin-content-alert admin-content-alert-success text-center">
                    <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="admin-content-alert admin-content-alert-danger text-center">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                </div>
            @endif
        </div>

        <div class="article-create-page__content container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="article-create-page__form-container card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="admin-content-alert admin-content-alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="article-create-page__form" method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Resto del form rimane invariato -->
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Titolo</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="subtitle" class="form-label">Sottotitolo</label>
                                    <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}" required>
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Immagine</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Categoria</label>
                                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                        <option value="">Seleziona una categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <!-- Aggiungi questo campo al form di creazione articolo -->
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <div class="border p-3 rounded @error('tags') is-invalid @enderror">
                                            <div class="row">
                                                @foreach ($tags as $tag)
                                                    <div class="col-md-4 mb-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}"
                                                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                                                {{ $tag->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @error('tags')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="body" class="form-label">Corpo dell'articolo</label>
                                    <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror" required>{{ old('body') }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="article-create-page__actions text-center mt-4">
                                    <button type="submit" class="article-create-page__submit-button btn btn-bg-primary-light text-white">Crea Articolo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
