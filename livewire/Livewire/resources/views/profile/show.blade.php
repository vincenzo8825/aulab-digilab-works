<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Profilo Utente
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">
                            Ruoli: 
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary me-1">{{ $role->name }}</span>
                            @endforeach
                        </p>
                        <p class="card-text">Registrato il: {{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">Cambia Password</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update.password') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Attuale</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Nuova Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Conferma Nuova Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Aggiorna Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="favorites-tab" data-bs-toggle="tab" data-bs-target="#favorites" type="button" role="tab" aria-controls="favorites" aria-selected="true">Articoli Preferiti</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Le Mie Recensioni</button>
                    </li>
                </ul>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                        @if($favorites->count() > 0)
                            <div class="row">
                                @foreach($favorites as $article)
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $article->title }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h6>
                                                <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                                                <a href="{{ route('article_show', $article) }}" class="btn btn-primary">Leggi</a>
                                                <form action="{{ route('favorites.toggle', $article) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Rimuovi dai preferiti</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                Non hai ancora aggiunto articoli ai preferiti.
                            </div>
                        @endif
                    </div>
                    
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        @if($reviews->count() > 0)
                            @foreach($reviews as $review)
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="{{ route('article_show', $review->article) }}">{{ $review->article->title }}</a>
                                            <div class="text-muted small">Recensito il {{ $review->created_at->format('d/m/Y') }}</div>
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
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-primary me-2">Modifica</a>
                                            <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-info">
                                Non hai ancora scritto recensioni.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>