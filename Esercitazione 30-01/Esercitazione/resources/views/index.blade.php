<x-layout title="Tutti gli Articoli">
    <h1 class="mb-4">Tutti gli Articoli</h1>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-3">
                <x-post-card :post="$post" />
            </div>
        @endforeach
    </div>
</x-layout>
