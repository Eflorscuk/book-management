@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{ $book->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}">
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-2">Voltar</a>
</div>
@endsection
