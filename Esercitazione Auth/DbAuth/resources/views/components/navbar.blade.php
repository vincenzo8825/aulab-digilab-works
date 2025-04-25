<nav class="navbar navbar-expand-lg bg-dark shadow border-white border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">PrimoBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() == 'homepage') active @endif"
                        aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chiSiamo') }}">Chi siamo</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.create') }}">Pubblica un post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.create') }}">Crea un articolo</a>
                    </li>
                    <!-- Aggiungi il link per la gestione dell'account -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account') }}">Gestisci Account</a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}">Tutti i Post</a>
                </li>
            </ul>

            {{-- Bottone per aprire la Modal --}}
            <button class="btn btn-outline-light" type="button" data-bs-toggle="modal" data-bs-target="#authModal">
                @auth
                    Ciao, {{ Auth::user()->name }}
                @else
                    Ciao, Accedi!
                @endauth
            </button>
        </div>
    </div>
</nav>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <!-- Altri link -->
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('account') }}">Gestisci Account</a>
        </li>
    @endauth
</ul>

{{-- Modal per Login, Registrazione e Logout --}}
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">
                    @auth
                        Profilo Utente
                    @else
                        Accedi o Registrati
                    @endauth
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @guest
                    <a class="btn btn-primary w-100 mb-2" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-secondary w-100" href="{{ route('register') }}">Registrati</a>
                @else
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</div>
