@extends('app')

@section('titolo', 'Servizi')

@section('contenuto')
    <h1 class="text-center mb-5">I nostri servizi</h1>

    <!-- Form di filtro Categoria -->

{{--da completare form collegandolo alla route



    <form class="row g-3">
        <div class="row mb-4">
            <div class="col-md-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-control">
                    <option value="">Seleziona Categoria</option>
                    <option value="1" {{ ('categoria') == 'categoria1' ? 'selected' : '' }}>web developer</option>
                    <option value="2" {{ ('categoria') == 'categoria2' ? 'selected' : '' }}>seo</option>
                </select>
            </div>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
      </form> --}}



        {{-- <a href="{{route('dettaglioServizio',['id'=>1])}}">Web developer</a> --}}





    <div class="row mb-4">
        <div class="col-md-3 col">
            <label for="categoria" class="form-label">Categoria</label>
            <select name="categoria" class="form-control">
                <option value="">Seleziona Categoria</option>
                <option value="categoria1" {{ ('categoria') == 'categoria1' ? 'selected' : '' }}>web developer</option>
                <option value="categoria2" {{ ('categoria') == 'categoria2' ? 'selected' : '' }}>seo</option>
            </select>
        </div>
    </div>

    <!-- Servizi -->
    <div class="row">
        @foreach ($servizi as $servizio)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="" class="card-img-top" alt="{{ $servizio['nome'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $servizio['nome'] }}</h5>
                        <p class="card-text">{{ $servizio['descrizione'] }}</p>
                        <a href="{{ route('dettaglioServizio', $servizio['id']) }}" class="btn btn-primary">Scopri di più</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
