@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-3 py-3">Lista de Livros</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($books as $book)
                <div class="col">
                    <div class="card" style="min-height: 300px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                            <p class="card-text">{{ $book->description }}</p>
                            <ul class="list-unstyled">
                                <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
                                <li><strong>Quantidade:</strong> {{ $book->quantity }}</li>
                            </ul>
                        </div>
                        <div class="card-footer d-flex flex-row">
                            @if(auth()->check() && auth()->user()->role === 'admin')
                            <form action="{{ route('books.edit', $book) }}" method="GET">
                                <button type="submit" class="btn btn-warning bg-warning mr-2">Editar</button>
                            </form>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bg-danger mr-2">Excluir</button>
                            </form>
                            @endif
                            <form action="{{ route('books.lend', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success bg-success mr-2">Reservar</button>
                            </form>
                            <form action="{{ route('books.return', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-secondary bg-danger mr-2">Devolver Livro</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="d-flex flex-row-reverse p-3">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
            </div>
        @endif
    </div>
@endsection
