<x-layout>
    <div class="container mt-5">
        <h1>{{ $articolo['titolo'] }}</h1>
        <p>{{ $articolo['dettaglio'] }}</p>
        <a href="{{ route('homepage') }}" class="btn btn-secondary">Torna Indietro</a>
    </div>
</x-layout>
