@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Livro</h1>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Autor</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" class="form-control" required>{{ $book->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="number" name="quantity" class="form-control" value="{{ $book->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
