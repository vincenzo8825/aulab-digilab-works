
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @if(Route::currentRouteName()!='contatti')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @vite(['resources/css/style.css', 'resources/js/app.js'])
@endif
</head>
<body>
    <x-navbar></x-navbar>
    {{$slot}}
</body>
</html>
