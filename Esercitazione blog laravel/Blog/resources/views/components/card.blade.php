@props(['id', 'titolo', 'testo'])

<div class="col-md-4">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $titolo }}</h5>
            <p class="card-text">{{ $testo }}</p>
            <a href="{{ route('articolo.show', ['id' => $id]) }}" class="btn btn-primary">Leggi di più</a>
        </div>
    </div>
</div>
