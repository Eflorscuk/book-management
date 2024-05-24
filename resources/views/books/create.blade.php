@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">Adicionar Livro</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" name="author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantidade</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success bg-success my-3">Salvar</button>
                        <a href="{{ route('books.index') }}" class="btn btn-danger bg-danger my-3">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
