<div>
    <p>Sei sicuro di voler eliminare questo articolo?</p>

    <button wire:click="delete">Elimina</button>

    @if (session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif
</div>
