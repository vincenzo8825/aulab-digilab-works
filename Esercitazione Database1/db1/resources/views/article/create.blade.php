<x-layout>
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" class="p-5 bg-light rounded shadow">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sottotitolo:</label>
            <input type="text" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}">
            @error('subtitle')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Corpo del testo:</label>
            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10">{{ old('body') }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine:</label>
            <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button class="btn btn-outline-dark" type="submit">
                Submit
            </button>
        </div>
    </form>
</x-layout>
