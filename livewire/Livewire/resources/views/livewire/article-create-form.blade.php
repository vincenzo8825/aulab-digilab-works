<main class="container">
    <section class="row justify-content-center">
        <article class="col-12 col-md-8">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit="article_store">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input wire:model="title" type="text" class="form-control" id="title"
                        aria-describedby="emailHelp">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Sottotitolo</label>
                    <input wire:model="subtitle" type="text" class="form-control" id="subtitle">
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea wire:model="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </article>
    </section>
</main>
