<x-layout>

    <h1>Gestisci Account</h1>


    <ul>
        @foreach($users as $user)
        <li>
            <!-- Link al profilo utente -->
            <a href="{{ route('profile', $user) }}">{{ $user->name }}</a>

            <!-- Form per eliminare l'utente -->
            <form action="{{ route('user.destroy', $user) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </li>
        @endforeach
    </ul>

</x-layout>
