<nav class="navbar navbar-expand-lg navbar-light mb-2 justify-content-between" style="background-color: #e9ecef;">
    <a class="navbar-brand" href="{{ route('listar_series') }}">
        Home
    </a>
    @auth
    <a href="{{ route('sair') }}">
        Sair
    </a>
    @endauth
    @guest
    <a href="{{ route('entrar') }}">
        Entrar
    </a>
    @endguest
</nav>