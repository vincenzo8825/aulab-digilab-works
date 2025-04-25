<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chi-siamo">Chi-siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contatti</a>
                </li>
            </ul>
        </div>
    </nav>
<h1>ciao</h1>
    <main class="container">
        <section>
            <h1>Benvenuto!</h1>
            <p>Questo è il mio sito web.</p>
            <a href="#" class="btn btn-primary">Scopri di più</a>
        </section>

        <section class="card-container">
            <div class="card">
                <img src="" class="card-img-top" alt="Immagine">
                <div class="card-body">
                    <h5 class="card-title">Card title 1</h5>
                    <p class="card-text">Some quick example text...</p>
                    <a href="#" class="btn btn-primary">Scopri di più</a>
                </div>
            </div>
            <div class="card">
                <img src="" class="card-img-top" alt="Immagine">
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text...</p>
                    <a href="#" class="btn btn-primary">Scopri di più</a>
                </div>
            </div>
            </section>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">

        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
