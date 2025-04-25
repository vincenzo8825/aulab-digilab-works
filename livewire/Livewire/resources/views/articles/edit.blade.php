<x-layout>
    <div class="container mt-4">
        <h1>Edit Article</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <livewire:article-edit-form :article="$article" />
    </div>
</x-layout>