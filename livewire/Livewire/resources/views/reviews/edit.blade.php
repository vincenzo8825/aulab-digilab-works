<x-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica recensione per "{{ $review->article->title }}"</div>
                    <div class="card-body">
                        <form action="{{ route('reviews.update', $review) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="rating" class="form-label">Valutazione</label>
                                <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                    <option value="">Seleziona una valutazione</option>
                                    <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 - Eccellente</option>
                                    <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 - Molto buono</option>
                                    <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 - Buono</option>
                                    <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 - Sufficiente</option>
                                    <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 - Scarso</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Recensione</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content', $review->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('article_show', $review->article) }}" class="btn btn-secondary">Annulla</a>
                                <button type="submit" class="btn btn-primary">Aggiorna recensione</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>