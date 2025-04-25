<x-layout>
    <div class="text-white">
        @if($user)
            <h1>Profilo di {{ $user->name }}</h1>
            <p>Email: {{ $user->email }}</p>
            <p>Creato il: {{ $user->created_at->format('d/m/Y') }}</p>

        @else
            <p>Utente non trovato.</p>
        @endif
    </div>
</x-layout>
