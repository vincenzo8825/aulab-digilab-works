<x-layout :title="$post->title">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Torna Indietro</a>
        </div>
    </div>
</x-layout>
