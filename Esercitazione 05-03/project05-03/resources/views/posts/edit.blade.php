<x-layout>
    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1>Modifica il tuo post</h1>
            </article>
            <article class="col-12 col-md-8">
                <form method="POST" action="{{ route('post_update', $post) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiorna</button>
                </form>
            </article>
        </section>
    </main>
</x-layout>
