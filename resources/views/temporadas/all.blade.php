@extends('layout')

@section('css')
    @parent
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection

@section('titulo')Temporadas @endsection

@section('body')
    <div class="container mb-2">
        <div class="jumbotron">
            <h1>Temporadas</h1>
        </div>

        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif

        @include('errors')

        <ul class="list-group">
            @foreach($temporadas as $temporada)
                <li class="list-group-item">
                    <span class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('episodios_da_temporada', $temporada->id) }}">
                            Temporada {{ $temporada->numero }}
                        </a>

                        <span>
                            <span class="badge badge-secondary">
                                {{ $temporada->getEpisodiosAssitidos()->count() }} / {{ $temporada->episodios->count() }}
                            </span>
                        </span>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
