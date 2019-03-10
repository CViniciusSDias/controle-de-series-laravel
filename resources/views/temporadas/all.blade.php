@extends('layout')

@section('titulo')Temporadas @endsection

@section('body')
    <div class="container">
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
                <li class="list-group-item">Temporada {{ $temporada->numero }}</li>
            @endforeach
        </ul>
@endsection
