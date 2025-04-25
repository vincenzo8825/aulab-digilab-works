<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
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
                <td>{{$article->user->name}}</td>
                <td>{{$article->category->name}}</td>
                <td>{{$article->created_at->format('d/m/Y')}}</td>
                <td>
                    @if($status == 'pending')
                        <div class="d-flex gap-2">
                            <a href="{{route('article.show', $article)}}" class="btn btn-info text-white button-article-read" target="_blank">
                                <i class="bi bi-eye"></i> Leggi
                            </a>
                            
                            <div class="action-buttons-container-{{$article->id}}">
                                <div class="normal-buttons-{{$article->id}}">
                                    <button type="button" class="btn btn-success button-article-accept" onclick="showConfirmButtons({{$article->id}}, 'accept')">
                                        <i class="bi bi-check-circle"></i> Accetta
                                    </button>
                                    
                                    <button type="button" class="btn btn-danger button-article-reject" onclick="showConfirmButtons({{$article->id}}, 'reject')">
                                        <i class="bi bi-x-circle"></i> Rifiuta
                                    </button>
                                </div>
                                
                                <div class="confirm-buttons-accept-{{$article->id}}" style="display: none;">
                                    <button type="button" class="btn btn-danger button-article-cancel" onclick="hideConfirmButtons({{$article->id}})">
                                        <i class="bi bi-arrow-left"></i> Annulla
                                    </button>
                                    <!-- Nella sezione dei bottoni di conferma -->
                                    <form action="{{route('revisor.acceptArticle', $article)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-check-circle"></i> Conferma
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="confirm-buttons-reject-{{$article->id}}" style="display: none;">
                                    <form action="{{route('revisor.rejectArticle', $article)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger button-article-confirm">
                                            <i class="bi bi-x-circle"></i> Conferma
                                        </button>
                                    </form>
                                    
                                    <button type="button" class="btn btn-success button-article-cancel" onclick="hideConfirmButtons({{$article->id}})">
                                        <i class="bi bi-arrow-left"></i> Annulla
                                    </button>
                                </div>
                            </div>
                        @endif
                        
                        @if($status == 'accepted' || $status == 'rejected')
                            <div class="d-flex gap-2">
                                <button id="read-button-{{$article->id}}" class="btn btn-info text-white button-article-read" onclick="toggleUndoButtons({{$article->id}})">
                                    <i class="bi bi-eye"></i> Leggi
                                </button>
                                
                                <button id="undo-button-{{$article->id}}" type="button" class="btn btn-warning button-article-undo" onclick="toggleUndoButtons({{$article->id}})">
                                    <i class="bi bi-arrow-counterclockwise"></i> Annulla
                                </button>
                            </div>
                        @endif
                    </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Non ci sono articoli da mostrare</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
function showConfirmButtons(articleId, action) {
    document.querySelector('.normal-buttons-' + articleId).style.display = 'none';
    if (action === 'accept') {
        document.querySelector('.confirm-buttons-accept-' + articleId).style.display = 'flex';
    } else if (action === 'reject') {
        document.querySelector('.confirm-buttons-reject-' + articleId).style.display = 'flex';
    }
}

function hideConfirmButtons(articleId) {
    document.querySelector('.confirm-buttons-accept-' + articleId).style.display = 'none';
    document.querySelector('.confirm-buttons-reject-' + articleId).style.display = 'none';
    document.querySelector('.normal-buttons-' + articleId).style.display = 'flex';
}

function toggleUndoButtons(articleId) {
    let undoButton = document.querySelector('#undo-button-' + articleId);
    let readButton = document.querySelector('#read-button-' + articleId);
    
    if (undoButton.dataset.state !== 'confirm') {
        undoButton.innerHTML = '<i class="bi bi-check-circle"></i> Conferma';
        undoButton.classList.remove('btn-warning');
        undoButton.classList.add('btn-danger');
        undoButton.dataset.state = 'confirm';

        readButton.innerHTML = '<i class="bi bi-arrow-left"></i> Annulla';
        readButton.classList.remove('btn-info');
        readButton.classList.add('btn-secondary');
    } else {
        undoButton.innerHTML = '<i class="bi bi-arrow-counterclockwise"></i> Annulla';
        undoButton.classList.remove('btn-danger');
        undoButton.classList.add('btn-warning');
        undoButton.dataset.state = '';

        readButton.innerHTML = '<i class="bi bi-eye"></i> Leggi';
        readButton.classList.remove('btn-secondary');
        readButton.classList.add('btn-info');
    }
}
</script>