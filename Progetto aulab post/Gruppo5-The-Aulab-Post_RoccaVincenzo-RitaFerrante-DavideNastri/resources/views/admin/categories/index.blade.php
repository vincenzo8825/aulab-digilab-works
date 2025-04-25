<x-layout>
    <div class="container">
        <!-- Header -->
        <div class="admin-content-header text-center">
            <h1 class="admin-content-title">Gestione Categorie</h1>
            <p class="admin-content-subtitle">Visualizza, crea, modifica ed elimina le categorie degli articoli</p>
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
                <h2>Elenco Categorie</h2>
                <a href="{{ route('admin.categories.create') }}" class="admin-content-btn admin-content-btn-primary">
                    <i class="bi bi-plus-circle"></i> Nuova Categoria
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
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <span class="admin-content-badge">{{ $category->articles->count() }}</span>
                                </td>
                                <!-- Sostituisci il pulsante di eliminazione esistente con questo -->
                                <td>
                                    <div class="admin-content-actions">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="dashboard-btn dashboard-btn-edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        
                                        <!-- Pulsante per mostrare la conferma -->
                                        <button type="button" class="dashboard-btn dashboard-btn-reject" id="showConfirm-{{ $category->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        
                                        <!-- Pulsanti di conferma (inizialmente nascosti) -->
                                        <div class="confirm-buttons-{{ $category->id }}" style="display: none;">
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-check-circle"></i> Conferma
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-secondary btn-sm" id="cancelDelete-{{ $category->id }}">
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
            
            @if(isset($categories) && method_exists($categories, 'links'))
                <div class="admin-content-pagination">
                    {{ $categories->links() }}
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
        @foreach($categories as $category)
            // Mostra i pulsanti di conferma
            document.getElementById('showConfirm-{{ $category->id }}').addEventListener('click', function() {
                document.querySelector('.confirm-buttons-{{ $category->id }}').style.display = 'block';
                this.style.display = 'none';
            });
            
            // Nascondi i pulsanti di conferma e mostra di nuovo il pulsante elimina
            document.getElementById('cancelDelete-{{ $category->id }}').addEventListener('click', function() {
                document.querySelector('.confirm-buttons-{{ $category->id }}').style.display = 'none';
                document.getElementById('showConfirm-{{ $category->id }}').style.display = 'inline-block';
            });
        @endforeach
    });
</script>