@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('books.create') }}" class="btn btn-primary">Adicionar Livro</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descrição</th>
                    <th>ISBN</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            <form action="{{ route('books.reserve', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Reservar</button>
                            </form>
                            <form action="{{ route('books.cancel', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-secondary">Cancelar Reserva</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
