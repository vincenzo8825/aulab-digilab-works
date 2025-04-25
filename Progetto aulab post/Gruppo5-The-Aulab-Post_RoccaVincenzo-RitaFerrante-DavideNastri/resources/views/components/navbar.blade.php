<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar__brand navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('images/logoVH-NEW.png') }}" alt="Logo" class="logo img-fluid w-75">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar__nav navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar__link nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="navbar__link nav-link" href="{{ route('article.index') }}">Articoli</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="navbar__dropdown-toggle nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="navbar__dropdown-menu dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li><a class="navbar__dropdown-item dropdown-item" href="{{ route('article.byCategory', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="navbar__link nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                </li>

                @auth
                    @if (Auth::user()->is_writer)
                        <li class="nav-item">
                            <a class="navbar__link nav-link" href="{{ route('article.create') }}">Crea Articolo</a>
                        </li>
                    @endif

                    @if (Auth::user()->is_admin || Auth::user()->is_revisor || Auth::user()->is_writer)
                        <li class="nav-item dropdown">
                            <a class="navbar__dropdown-toggle nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="navbar__dropdown-menu dropdown-menu dashboard-menu" aria-labelledby="dashboardDropdown">
                                @if (Auth::user()->is_admin)
                                    <li><a class="navbar__dropdown-item dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-shield-lock"></i> Dashboard Amministratore</a></li>
                                @endif
                                @if (Auth::user()->is_revisor)
                                    <li><a class="navbar__dropdown-item dropdown-item" href="{{ route('revisor.dashboard') }}"><i class="bi bi-check-circle"></i> Dashboard Revisore</a></li>
                                @endif
                                @if (Auth::user()->is_writer)
                                    <li><a class="navbar__dropdown-item dropdown-item" href="{{ route('writer.dashboard') }}"><i class="bi bi-pencil"></i> Dashboard Redattore</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>

            <ul class="navbar__nav navbar-nav ms-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="navbar__link nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar__link nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="navbar__dropdown-toggle nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="navbar__dropdown-menu dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="navbar__dropdown-item dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
