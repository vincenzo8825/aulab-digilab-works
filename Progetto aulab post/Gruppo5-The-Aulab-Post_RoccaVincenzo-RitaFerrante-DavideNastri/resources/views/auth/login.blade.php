<x-layout>
    <div class="auth-page">
        <header class="auth-page__header container-fluid p-5 bg-secondary-subtle text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="auth-page__title display-4">Accedi</h1>
                </div>
            </div>
        </header>

        <div class="auth-page__content container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="auth-page__form-container card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="auth-page__errors alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="auth-page__form" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Ricordami</label>
                                </div>

                                <div class="auth-page__actions text-center mt-4">
                                    <button type="submit" class="auth-page__submit-button btn btn-custom-green">Accedi</button>
                                </div>

                                <div class="auth-page__links text-center mt-3">
                                    <p>Non hai un account? <a href="{{ route('register') }}" class="auth-page__register-link">Registrati</a></p>
                                    @if (Route::has('password.request'))
                                        <p><a href="{{ route('password.request') }}" class="auth-page__forgot-link">Password dimenticata?</a></p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
