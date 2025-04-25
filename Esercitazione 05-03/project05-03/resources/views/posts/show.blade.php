<x-layout>
    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1>Dettaglio del post</h1>

                <p><strong>Titolo:</strong> {{$post->title}}</p>
                <p><strong>Descrizione:</strong> {{$post->description}}</p>
                <p><strong>Creato da:</strong> {{$post->user->name}}</p>

                @auth
                    @if(Auth::user()->id === $post->user_id)
                        <a href="{{ route('post_edit', $post) }}" class="btn btn-light">Modifica post</a>
                    @endif
                @endauth
            </article>
        </section>
    </main>
</x-layout>
