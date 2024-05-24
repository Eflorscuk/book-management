<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show', 'reserve', 'cancelReservation']);
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function store(BookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso');
    }

    public function update(BookRequest $request, Book $book)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'author' => 'required',
        //     'description' => 'required',
        //     'isbn' => 'required',
        //     'quantity' => 'required|integer'
        // ]);

        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro removido com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function reserve(Book $book)
    {
        if ($book->quantity > 0) {
            $book->decrement('quantity');
            return redirect()->route('books.index')->with('success', 'Livro reservado com sucesso.');
        }

        return redirect()->route('books.index')->with('error', 'Livro indisponível.');
    }

    public function cancelReservation(Book $book)
    {
        $book->increment('quantity');
        return redirect()->route('books.index')->with('success', 'Reserva cancelada com sucesso.');
    }
}
