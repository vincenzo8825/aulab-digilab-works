<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="categories" content="sport, viaggi, politica, intrattenimento, economia, tech, food&drink ">
    <title>VerbaHub</title>
    <link rel="icon" type="png" href="{{ asset('images/logoFavicon2.png') }}">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if(isset($bodyClass) && $bodyClass == 'is-homepage')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @endif
</head>
<body class="site-body {{ $bodyClass ?? '' }}">
    <x-navbar />

    <main class="site-main">
        {{ $slot }}
    </main>

    <x-footer />

    <!-- Carica gli script  in modo asincrono -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        });
    </script>
</body>
</html>
