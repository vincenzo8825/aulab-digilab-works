<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $title ?? '1ProgettoLaravel' }} </title>
    {{-- coalescing operator - $title ? $title : 'Digilab' --}}
    {{-- direttiva blade @vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body class="bg-dark">
    {{-- @if (Route::currentRouteName() != 'chiSiamo') --}}
        <x-navbar />
    {{-- @endif --}}
    {{ $slot }}

    <x-footer/>
</body>

</html>
