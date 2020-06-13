@extends('layout')

@section('titulo')Adicionar uma série @endsection

@section('body')
    <div class="container">
        <div class="jumbotron">
            <h1>Adicionar uma série</h1>
        </div>

        @include('errors')

        <form method="post">
            @csrf
            <div class="row">
                <div class="col col-4">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required class="form-control">
                </div>

                <div class="col col-4">
                    <label for="genre">Gênero</label>
                    <select id="genre" name="genre" required class="form-control">
                        <option value="">Selecione</option>
                        <option value="drama">Drama</option>
                        <option value="acao">Ação</option>
                        <option value="comedia">Comédia</option>
                    </select>
                </div>

                <div class="col col-2">
                    <label for="qtd_temporadas">Nº de temporadas</label>
                    <input type="number" name="qtd_temporadas" id="qtd_temporadas" required min="1" class="form-control">
                </div>

                <div class="col col-2">
                    <label for="ep_por_temporada">Ep. por temporada</label>
                    <input type="number" name="ep_por_temporada" id="ep_por_temporada" min="1" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Salvar
            </button>
        </form>
    </div>
@endsection
