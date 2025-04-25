<x-layout>
    <div class="careers-page">
        <header class="careers-page__header container-fluid p-5 text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="careers-page__title display-4">Lavora con noi</h1>
                    <p class="careers-page__subtitle lead">Unisciti al nostro team di professionisti</p>
                </div>
            </div>
        </header>

        <!-- Messaggi di notifica -->
        <div class="container mt-4">
            @if (session('message'))
                <div class="admin-content-alert admin-content-alert-success text-center">
                    <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="admin-content-alert admin-content-alert-danger text-center">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                </div>
            @endif
        </div>

        <div class="careers-page__content container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="careers-page__info card mb-5">
                        <div class="card-body">
                            <h2 class="careers-page__section-title">Posizioni aperte</h2>
                            <p>Siamo sempre alla ricerca di talenti per il nostro team. Attualmente abbiamo bisogno di:</p>
                            <ul class="careers-page__positions-list">
                                <li>Amministratori</li>
                                <li>Revisori</li>
                                <li>Redattori</li>
                            </ul>
                        </div>
                    </div>

                    <div class="careers-page__form-container card mb-5">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="admin-content-alert admin-content-alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('careers.submit') }}" method="POST" class="careers-page__form p-3">
                                @csrf
                                <!-- Resto del form rimane invariato -->
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="" selected disabled>Seleziona il ruolo</option>
                                        @if (!Auth::user()->is_admin)
                                            <option value="admin">Amministratore</option>
                                        @endif
                                        @if (!Auth::user()->is_revisor)
                                            <option value="revisor">Revisore</option>
                                        @endif
                                        @if (!Auth::user()->is_writer)
                                            <option value="writer">Redattore</option>
                                        @endif
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="message" class="form-label">Parlaci di te</label>
                                    <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror"></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="careers-page__actions mt-3 text-center">
                                    <button class="careers-page__submit-button btn btn-bg-primary-light text-white">Invia candidatura</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
