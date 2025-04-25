<x-layout>
    <main class="container">
        <section class="row vh-100 justify-content-center">
            <article class="col-12 text-center">
                <h1>Crea un nuovo post</h1>
            </article>
            <article class="col-12 col-md-8">
                <form method="POST" action="{{route('post_store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </article>
        </section>
    </main>
    ssss
</x-layout>
