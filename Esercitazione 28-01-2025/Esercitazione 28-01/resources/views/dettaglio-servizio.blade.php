@extends('app')

@section('titolo', $servizio['nome'])

@section('contenuto')
    <div class="container mt-5">
        <h1>{{ $servizio['nome'] }}</h1>
        <p class="lead">{{ $servizio['descrizione'] }}</p>

        <div class="alert alert-info">
            <h5 class="alert-heading">Ulteriori informazioni</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget orci vel ipsum dictum aliquet. Vivamus auctor nisi et augue vehicula, eu facilisis dui iaculis.</p>
        </div>

        <a href="{{ route('servizi') }}" class="btn btn-secondary">Torna ai servizi</a>
    </div>
@endsection
