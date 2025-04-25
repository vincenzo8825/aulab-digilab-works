<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titolo')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}">1sito</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('chiSiamo') }}">Chi siamo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('servizi') }}">Servizi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('contenuto')
    </div>
</body>
</html>
