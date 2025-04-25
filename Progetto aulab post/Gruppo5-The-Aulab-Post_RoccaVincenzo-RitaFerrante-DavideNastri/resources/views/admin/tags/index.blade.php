<x-layout>
    <div class="container">
        <!-- Header -->
        <div class="admin-content-header text-center">
            <h1 class="admin-content-title">Gestione Tag</h1>
            <p class="admin-content-subtitle">Visualizza, crea, modifica ed elimina i tag degli articoli</p>
        </div>
        
        <!-- Alert messaggi -->
        @if(session('message'))
            <div class="admin-content-alert admin-content-alert-success">
                {{ session('message') }}
            </div>
        @endif
        
        <!-- Contenuto principale -->
        <div class="admin-content-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Elenco Tag</h2>
                <a href="{{ route('admin.tags.create') }}" class="admin-content-btn admin-content-btn-primary">
                    <i class="bi bi-plus-circle"></i> Nuovo Tag
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="admin-content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Articoli</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <span class="admin-content-badge">{{ $tag->articles->count() }}</span>
                                </td>
                                <td>
                                    <div class="admin-content-actions">
                                        <a href="{{ route('admin.tags.edit', $tag) }}" class="dashboard-btn dashboard-btn-edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        
                                        <!-- Pulsante per mostrare la conferma -->
                                        <button type="button" class="dashboard-btn dashboard-btn-reject" id="showConfirm-{{ $tag->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        
                                        <!-- Pulsanti di conferma (inizialmente nascosti) -->
                                        <div class="confirm-buttons-{{ $tag->id }}" style="display: none;">
                                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-check-circle"></i> Conferma
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-secondary btn-sm" id="cancelDelete-{{ $tag->id }}">
                                                <i class="bi bi-x-circle"></i> Annulla
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Paginazione se necessaria -->
            @if(isset($tags) && method_exists($tags, 'links'))
                <div class="admin-content-pagination">
                    {{ $tags->links() }}
                </div>
            @endif
        </div>
        
        <!-- Link per tornare alla dashboard -->
        <div class="text-center mt-4 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="admin-content-btn admin-content-btn-secondary">
                <i class="bi bi-arrow-left"></i> Torna alla Dashboard
            </a>
        </div>
    </div>
</x-layout>
<script>
        // Gestione dei pulsanti di eliminazione
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($tags as $tag)
                // Mostra i pulsanti di conferma
                document.getElementById('showConfirm-{{ $tag->id }}').addEventListener('click', function() {
                    document.querySelector('.confirm-buttons-{{ $tag->id }}').style.display = 'block';
                    this.style.display = 'none';
                });
                
                // Nascondi i pulsanti di conferma e mostra di nuovo il pulsante elimina
                document.getElementById('cancelDelete-{{ $tag->id }}').addEventListener('click', function() {
                    document.querySelector('.confirm-buttons-{{ $tag->id }}').style.display = 'none';
                    document.getElementById('showConfirm-{{ $tag->id }}').style.display = 'inline-block';
                });
            @endforeach
        });
    </script>