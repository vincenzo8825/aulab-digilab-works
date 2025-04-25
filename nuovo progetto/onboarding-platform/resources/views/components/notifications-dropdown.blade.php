<div class="dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        @if($unreadCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $unreadCount }}
                <span class="visually-hidden">notifiche non lette</span>
            </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="notificationsDropdown" style="width: 300px; max-height: 400px; overflow-y: auto;">
        <div class="card border-0">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Notifiche</h6>
                @if($unreadCount > 0)
                    <a href="#" class="small text-decoration-none" wire:click.prevent="markAsRead">Segna tutte come lette</a>
                @endif
            </div>
            <div class="list-group list-group-flush">
                @forelse($notifications as $notification)
                    <div class="list-group-item list-group-item-action {{ $notification->read_at ? '' : 'bg-light' }}">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1">
                                @if($notification->type === 'App\\Notifications\\NewTicketReply')
                                    <i class="fas fa-comment-dots text-primary me-2"></i> Nuovo messaggio
                                @else
                                    <i class="fas fa-bell text-secondary me-2"></i> Notifica
                                @endif
                            </h6>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        @if($notification->type === 'App\\Notifications\\NewTicketReply')
                            <p class="mb-1">{{ $notification->data['message'] }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Ticket: {{ $notification->data['title'] }}</small>
                                @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('admin.tickets.show', $notification->data['ticket_id']) }}" class="btn btn-sm btn-primary">Visualizza</a>
                                @else
                                    <a href="{{ route('employee.tickets.show', $notification->data['ticket_id']) }}" class="btn btn-sm btn-primary">Visualizza</a>
                                @endif
                            </div>
                        @else
                            <p class="mb-1">{{ $notification->data['message'] ?? 'Nuova notifica' }}</p>
                        @endif
                    </div>
                @empty
                    <div class="list-group-item text-center py-3">
                        <i class="fas fa-bell-slash fa-2x text-muted mb-2"></i>
                        <p class="mb-0">Nessuna notifica</p>
                    </div>
                @endforelse
            </div>
            @if(count($notifications) > 0)
                <div class="card-footer text-center">
                    <a href="#" class="small text-decoration-none">Vedi tutte le notifiche</a>
                </div>
            @endif
        </div>
    </div>
</div>
