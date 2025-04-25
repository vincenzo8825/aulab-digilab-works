<nav class="navbar navbar-expand-lg bg-dark shadow  border-white border-bottom" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}">logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">

                    <a class="nav-link  @if (Route::currentRouteName() == 'homepage') active" @endif aria-current="page"
                        href="{{ route('homepage') }}">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('chiSiamo') }}">Chi siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('docenti') }}">I nostri docenti</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.create') }}">Pubblica un articolo</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
