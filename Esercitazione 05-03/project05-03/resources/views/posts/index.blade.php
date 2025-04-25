<x-layout>

    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1>Tutti i nostri post</h1>
            </article>
            @foreach ($posts as $post)
                <article class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <a href="{{ route('post_show', ['post' => $post]) }}" class="btn btn-primary">Visualizza
                                Dettaglio</a>
                            @auth
                                @if (Auth::user()->id === $post->user_id)
                                    <form action="{{route('post_delete', ['post' => $post])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Elimina post</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </main>

</x-layout>
