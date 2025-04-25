<x-layout>
    <div class="admin-tags-edit">
        <header class="admin-tags-edit__header container-fluid p-5 bg-secondary-subtle text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="admin-tags-edit__title display-1">Modifica Tag</h1>
                </div>
            </div>
        </header>
        
        <section class="admin-tags-edit__section container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="admin-tags-edit__form">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome del Tag</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tag->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">Annulla</a>
                            <button type="submit" class="btn btn-primary">Aggiorna Tag</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-layout>