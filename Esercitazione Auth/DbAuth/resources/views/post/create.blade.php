<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-5 display-3 text-white">Pubblica un post</h1>
            </div>
        </div>
        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-6">
                {{-- !SE VOLETE AGGIUNGERE DEI FILE NEI FORM ENCTYPE=MULTIPART, ACCETTA PIù TIPI DI DATO --}}
                <form action="{{ route('post.store') }}" method="POST" class="p-5 bg-light rounded shadow"
                    enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <p class="fst-italic text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" id="subtitle"
                            class="form-control @error('subtitle') is-invalid @enderror" name="subtitle"
                            value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <p class="fst-italic text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30"
                            rows="10">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="fst-italic text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Aggiungi una immagine:</label>
                        <input type="file" name="img" id="img"
                            class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                            <p class="fst-italic text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="btn btn-outline-dark" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
