<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('books.index') }}">Book Management</a>

        <!-- Mostrar mensagem de boas-vindas e botão de logout -->
        @auth
        <span class="navbar-text mr-3">Bem-vindo, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form>
        @endauth



        <!-- Botão de hamburguer para dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Se o usuário estiver autenticado, mostrar opções de logout -->
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
                @endif
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
