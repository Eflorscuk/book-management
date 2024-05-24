@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <div class="row">
        <div class="col-md-8">
            <p><strong>Autor:</strong> {{ $book->author }}</p>
            <p><strong>Descrição:</strong> {{ $book->description }}</p>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Quantidade:</strong> {{ $book->quantity }}</p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('books.index') }}" class="btn btn-secondary mb-2">Voltar</a>
            @can('admin')
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning mb-2">Editar</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-2">Excluir</button>
                </form>
            @endcan
            <form action="{{ route('books.reserve', $book) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-success mb-2">Reservar</button>
            </form>
            <form action="{{ route('books.cancel', $book) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-secondary mb-2">Cancelar Reserva</button>
            </form>
        </div>
    </div>
</div>
@endsection
