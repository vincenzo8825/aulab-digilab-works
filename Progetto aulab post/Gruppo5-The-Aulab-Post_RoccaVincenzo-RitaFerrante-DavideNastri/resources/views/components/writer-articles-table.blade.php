<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->subtitle}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->created_at->format('d/m/Y')}}</td>
                <td>
                    <div class="writer-dashboard__actions d-flex">
                        <a href="{{ route('article.show', $article) }}" class="writer-dashboard__action-link button-writer-view btn btn-sm me-2">Leggi</a>

                        <!-- Mostra il pulsante Modifica per tutti gli articoli, indipendentemente dallo stato -->
                        <a href="{{ route('article.edit', $article) }}" class="writer-dashboard__action-link btn button-writer-edit btn-sm me-2">Modifica</a>

                        <!-- Pulsante Elimina -->
                        <button type="button" class="writer-dashboard__action-link btn button-writer-delete btn-sm btn-confirm"
                                data-id="{{ $article->id }}"
                                data-action="delete-article"
                                data-message="Confermi di voler eliminare questo articolo?">
                            <i class="bi bi-trash"></i> Elimina
                        </button>

                        <div class="confirm-container confirm-container-delete-article-{{ $article->id }}" style="display: none;">
                            <span class="confirm-message"></span>
                            <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-confirm-action">
                                    <i class="bi bi-trash"></i> Conferma
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action"
                                    data-id="{{ $article->id }}"
                                    data-action="delete-article">
                                <i class="bi bi-x-circle"></i> Annulla
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Non ci sono articoli
                    @if($status == 'pending')
                        in revisione
                    @elseif($status == 'accepted')
                        pubblicati
                    @elseif($status == 'rejected')
                        rifiutati
                    @endif
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
