<x-layout>
    <h1 class="mb-4 text-center">Articoli del Blog</h1>
    <div class="row">
        @foreach($articoli as $articolo)
            <x-card :id="$articolo['id']" :titolo="$articolo['titolo']" :testo="$articolo['testo']" />
        @endforeach
    </div>
</x-layout>

