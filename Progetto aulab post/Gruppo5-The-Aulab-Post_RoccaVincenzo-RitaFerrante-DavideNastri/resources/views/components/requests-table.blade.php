<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roleRequests as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="d-flex gap-2">
                        @switch($role)
                            @case('amministratore')
                                <!-- Pulsante Attiva Amministratore con colore accent -->
                                <button type="button" class="btn btn-info text-white btn-confirm" 
                                        style="background-color: var(--color-accent) !important; border-color: var(--color-accent) !important;"
                                        data-id="{{ $user->id }}" 
                                        data-action="activate-admin" 
                                        data-message="Confermi di voler attivare {{$role}} per {{$user->name}}?">
                                    <i class="bi bi-check-circle"></i> Attiva {{$role}}
                                </button>
                                
                                <div class="confirm-container confirm-container-activate-admin-{{ $user->id }}" style="display: none;">
                                    <span class="confirm-message"></span>
                                    <form action="{{route('admin.setAdmin', $user)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info text-white btn-sm btn-confirm-action">
                                            <i class="bi bi-check-circle"></i> Conferma
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                            data-id="{{ $user->id }}" 
                                            data-action="activate-admin">
                                        <i class="bi bi-x-circle"></i> Annulla
                                    </button>
                                </div>
                                @break
                                
                            @case('revisore')
                                <!-- Pulsante Attiva Revisore -->
                                <button type="button" class="btn button-admin-approve text-white btn-confirm" 
                                        data-id="{{ $user->id }}" 
                                        data-action="activate-revisor" 
                                        data-message="Confermi di voler attivare {{$role}} per {{$user->name}}?">
                                    <i class="bi bi-check-circle"></i> Attiva {{$role}}
                                </button>
                                
                                <div class="confirm-container confirm-container-activate-revisor-{{ $user->id }}" style="display: none;">
                                    <span class="confirm-message"></span>
                                    <form action="{{route('admin.setRevisor', $user)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info text-white btn-sm btn-confirm-action">
                                            <i class="bi bi-check-circle"></i> Conferma
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                            data-id="{{ $user->id }}" 
                                            data-action="activate-revisor">
                                        <i class="bi bi-x-circle"></i> Annulla
                                    </button>
                                </div>
                                @break
                                
                            @case('redattore')
                                <!-- Pulsante Attiva Redattore -->
                                <button type="button" class="btn button-admin-approve text-white btn-confirm" 
                                        data-id="{{ $user->id }}" 
                                        data-action="activate-writer" 
                                        data-message="Confermi di voler attivare {{$role}} per {{$user->name}}?">
                                    <i class="bi bi-check-circle"></i> Attiva {{$role}}
                                </button>
                                
                                <div class="confirm-container confirm-container-activate-writer-{{ $user->id }}" style="display: none;">
                                    <span class="confirm-message"></span>
                                    <form action="{{route('admin.setWriter', $user)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info text-white btn-sm btn-confirm-action">
                                            <i class="bi bi-check-circle"></i> Conferma
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                            data-id="{{ $user->id }}" 
                                            data-action="activate-writer">
                                        <i class="bi bi-x-circle"></i> Annulla
                                    </button>
                                </div>
                                @break
                        @endswitch
                        
                        <!-- Pulsante Elimina Richiesta -->
                        <button type="button" class="btn button-admin-reject btn-confirm" 
                                data-id="{{ $user->id }}" 
                                data-action="reject-request" 
                                data-message="Confermi di voler eliminare questa richiesta?">
                            <i class="bi bi-x-circle"></i> Elimina
                        </button>
                        
                        <div class="confirm-container confirm-container-reject-request-{{ $user->id }}" style="display: none;">
                            <span class="confirm-message"></span>
                            <form action="{{route('admin.requests.reject', $user)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-confirm-action">
                                    <i class="bi bi-x-circle"></i> Conferma
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary btn-sm btn-cancel btn-cancel-action" 
                                    data-id="{{ $user->id }}" 
                                    data-action="reject-request">
                                <i class="bi bi-x-circle"></i> Annulla
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Non ci sono richieste per il ruolo di {{$role}}</td>
            </tr>
        @endforelse
    </tbody>
</table>
