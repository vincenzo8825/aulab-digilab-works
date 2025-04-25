<x-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">I miei Badge e Riconoscimenti</h5>
            </div>
            <div class="card-body">
                @if($badges->count() > 0)
                    <div class="row">
                        @foreach($badges as $badge)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="badge-icon mb-3" style="color: {{ $badge->color }}">
                                            <i class="{{ $badge->icon }} fa-4x"></i>
                                        </div>
                                        <h5 class="card-title">{{ $badge->name }}</h5>
                                        <p class="card-text small text-muted">{{ $badge->description }}</p>
                                        <div class="mt-3">
                                            <small class="text-muted">Ottenuto il {{ $badge->pivot->awarded_at->format('d/m/Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-award fa-4x text-muted"></i>
                        </div>
                        <h4>Non hai ancora ricevuto badge</h4>
                        <p class="text-muted">Completa le attività di onboarding e i corsi formativi per guadagnare badge e riconoscimenti.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>