<x-layout>
    <div class="container mt-4">
        <h1>Gestione Ruoli</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="card mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ruoli Attuali</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge bg-primary me-1">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if(!$user->hasRole('reviewer'))
                                        <form action="{{ route('roles.assign', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="role_id" value="{{ $roles->where('name', 'reviewer')->first()->id }}">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Assegna Revisore
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('roles.remove', [$user, $roles->where('name', 'reviewer')->first()]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Rimuovi Revisore
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>