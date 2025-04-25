<x-layout>
    <div class="container" style="margin-bottom: 0; padding-bottom: 3rem;">
        <!-- Header -->
        <div class="admin-content-header text-center">
            <h1 class="admin-content-title">Crea Nuovo Tag</h1>
            <p class="admin-content-subtitle">Aggiungi un nuovo tag per gli articoli</p>
        </div>
        
        <!-- Contenuto principale -->
        <div class="admin-content-container">
            <!-- Form di creazione -->
            <form class="admin-content-form" method="POST" action="{{ route('admin.tags.store') }}">
                @csrf
                
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
                    <label for="name" class="admin-content-form-label">Nome Tag</label>
                    <input type="text" name="name" id="name" class="admin-content-form-input" value="{{ old('name') }}" required>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.tags.index') }}" class="admin-content-btn admin-content-btn-secondary">
                        <i class="bi bi-arrow-left"></i> Annulla
                    </a>
                    <button type="submit" class="admin-content-btn admin-content-btn-success">
                        <i class="bi bi-check-lg"></i> Crea Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>