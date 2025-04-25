<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Leggi di più</a>
    </div>
</div>
