<x-layout>
    <div class="container mt-5">
        <!-- Messaggio di successo -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 col-md-4 text-white d-flex justify-content-center mb-3">
                    <div class="card" style="width: 18rem;">
                        @if ($post->img)
                            <img src="{{ Storage::url($post->img) }}" class="card-img-top" alt="Immagine di {{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->subtitle }}</p>
                            <a href="#" class="btn btn-dark">Leggi di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
