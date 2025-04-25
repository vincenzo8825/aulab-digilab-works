<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <h3 class="text-muted">{{ $article->subtitle }}</h3>
                
                <div class="d-flex justify-content-between align-items-center my-3">
                    <div>
                        <span class="text-muted">Pubblicato il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}</span>
                    </div>
                    
                    @auth
                        <div>
                            <form action="{{ route('favorites.toggle', $article) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn {{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? 'btn-danger' : 'btn-outline-danger' }}">
                                    <i class="bi bi-heart{{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? '-fill' : '' }}"></i>
                                    {{ auth()->user()->favorites()->where('article_id', $article->id)->exists() ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti' }}
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
                
                <div class="my-4">
                    <p>{{ $article->description }}</p>
                </div>
                
                <div class="my-4">
                    <h4>Recensioni</h4>
                    
                    @auth
                        @if(!auth()->user()->reviews()->where('article_id', $article->id)->exists())
                            <div class="card mb-4">
                                <div class="card-header">Scrivi una recensione</div>
                                <div class="card-body">
                                    <form action="{{ route('reviews.store', $article) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Valutazione</label>
                                            <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                                <option value="">Seleziona una valutazione</option>
                                                <option value="5">5 - Eccellente</option>
                                                <option value="4">4 - Molto buono</option>
                                                <option value="3">3 - Buono</option>
                                                <option value="2">2 - Sufficiente</option>
                                                <option value="1">1 - Scarso</option>
                                            </select>
                                            @error('rating')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">Recensione</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Invia recensione</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                    
                    @if($article->reviews->count() > 0)
                        @foreach($article->reviews as $review)
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $review->user->name }}</strong>
                                        <span class="text-muted"> - {{ $review->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @else
                                                <i class="bi bi-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $review->content }}</p>
                                    
                                    @auth
                                        @if(auth()->id() === $review->user_id)
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-primary me-2">Modifica</a>
                                                <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            Nessuna recensione disponibile per questo articolo. Sii il primo a recensirlo!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>