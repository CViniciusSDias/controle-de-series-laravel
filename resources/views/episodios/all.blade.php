@extends('layout')

@section('css')
    @parent
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection

@section('titulo')Episódios @endsection

@section('body')
    <div class="container mb-3">
        <div class="jumbotron">
            <h1>Episódios</h1>
        </div>

        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif

        @include('errors')

        <form action="{{ route('assistir_episodios', $temporadaId) }}" method="post">
            @csrf
            <ul class="list-group">
                @foreach($episodios as $episodio)
                    <li class="list-group-item">
                        <span class="d-flex justify-content-between align-items-center">
                            Episódio {{ $episodio->numero }}

                            @auth
                            <span>
                                <input type="checkbox" aria-label="Marcar como assistido" name="episodio[{{ $episodio->id }}][assitido]" {{ $episodio->assistido == 1 ? 'checked' : '' }}>
                            </span>
                            @endauth
                        </span>
                    </li>
                @endforeach
            </ul>

            <button class="btn btn-primary mt-2">
                Salvar assistidos
            </button>
        </form>
    </div>
@endsection
