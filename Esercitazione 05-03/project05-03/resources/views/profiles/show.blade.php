
<x-layout>
    <div class="container">
        <h1>Profilo di {{ Auth::user()->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h5>Indirizzo: {{ $profile->address ?? 'Non inserito' }}</h5>
                <h5>Telefono: {{ $profile->phone ?? 'Non inserito' }}</h5>
                <h5>Avatar:
                    @if($profile->avatar)
                        <img src="{{ Storage::url($profile->avatar) }}" alt="Avatar" width="100">
                    @else
                        Nessun avatar
                    @endif
                </h5>

                <form action="{{ route('profile.edit') }}" method="get">
                    <button type="submit" class="btn btn-primary">Modifica Profilo</button>
                </form>
            </div>
        </div>
    </div>
ssssss
</x-layout>
