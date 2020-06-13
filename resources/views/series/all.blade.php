@extends('layout')

@section('css')
    @parent
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection

@section('titulo')Lista de séries @endsection

@section('body')
    <div class="container mb-2">
        <div class="jumbotron">
            <h1>Séries</h1>
        </div>

        @if(!empty($mensagem))
            <div class="alert alert-success">
                {{ $mensagem }}
            </div>
        @endif

        @include('errors')

        <a href="{{ route('adicionar_serie') }}" class="btn btn-dark mb-2">
            Adicionar
        </a>

        <ul class="list-group">
            @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-serie-id="{{ $serie->id }}">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                <span>
                    <a href="{{ route('temporadas_da_serie', $serie->id) }}" class="btn btn-info">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @auth
                    <button type="button" class="btn btn-info" onclick="toggleInput({{ $serie->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="excluirSerie('{{ addslashes($serie->nome) }}', '{{ route('remover_serie', $serie->id) }}')" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    @endauth
                </span>
            </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('js')
    <script>
        function excluirSerie(nomeSerie, url) {
            let mensagem = `Tem certeza que deseja remover ${nomeSerie}?`;
            if (!confirm(mensagem)) {
                return;
            }

            location.href = url;
        }

        function toggleInput(idSerie) {
            if (document.getElementById(`nome-serie-${idSerie}`).hasAttribute('hidden')) {
                document.getElementById(`input-nome-serie-${idSerie}`).hidden = true;
                document.getElementById(`nome-serie-${idSerie}`).removeAttribute('hidden');
            } else {
                document.getElementById(`nome-serie-${idSerie}`).hidden = true;
                document.getElementById(`input-nome-serie-${idSerie}`).removeAttribute('hidden');
            }
        }

        function editarSerie(idSerie) {
            const novoNome = document.querySelector(`#input-nome-serie-${idSerie} > input`).value;
            if (novoNome.length === 0) {
                toggleInput(idSerie);
                return;
            }

            const token = document.querySelector("input[name='_token']").value;
            let formData = new FormData();
            formData.append('nome', novoNome);
            formData.append('_token', token);

            fetch(`/alterar-nome-serie/${idSerie}`, {
                method: 'POST',
                body: formData
            }).then(res => {
                toggleInput(idSerie);

                if (res.ok) {
                    document.getElementById(`nome-serie-${idSerie}`).textContent = novoNome;
                }
            });
        }
    </script>
@endsection
