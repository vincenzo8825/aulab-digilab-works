<x-layout>
    <div class="container">
        <!-- Header -->
        <div class="admin-content-header text-center">
            <h1 class="admin-content-title">Modifica Categoria</h1>
            <p class="admin-content-subtitle">Aggiorna i dettagli della categoria "{{ $category->name }}"</p>
        </div>
        
        <!-- Contenuto principale -->
        <div class="admin-content-container">
            <!-- Form di modifica -->
            <form class="admin-content-form" method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf
                @method('PUT')
                
                <!-- Errori di validazione -->
                @if ($errors->any())
                    <div class="admin-content-alert admin-content-alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="admin-content-form-group">
                    <label for="name" class="admin-content-form-label">Nome Categoria</label>
                    <input type="text" name="name" id="name" class="admin-content-form-input" value="{{ old('name', $category->name) }}" required>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.categories.index') }}" class="admin-content-btn admin-content-btn-secondary">
                        <i class="bi bi-arrow-left"></i> Annulla
                    </a>
                    <button type="submit" class="admin-content-btn admin-content-btn-success">
                        <i class="bi bi-check-lg"></i> Aggiorna Categoria
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>