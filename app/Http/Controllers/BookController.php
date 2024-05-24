<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lend;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show', 'lend', 'return']);
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
        $book->update($request->validated());

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro removido com sucesso.');
    }

    public function lend(Book $book)
    {
        $user = auth()->user();

        if ($book->quantity > 0) {
            $lend = Lend::create([
                'quantity' => 1,
                'loan_date' => now(),
                'book_id' => $book->id,
                'user_id' => $user->id,
            ]);

            $book->decrement('quantity');

            return redirect()->route('books.index')->with('success', 'Livro emprestado com sucesso.');
        }

        return redirect()->route('books.index')->with('error', 'Livro indisponível para empréstimo.');
}

    public function return(Book $book)
    {
        $user = auth()->user();
        $sql = "DELETE FROM lends WHERE user_id = :user_id";
        DB::statement($sql, ['user_id' => $user]);
        $book->increment('quantity');
        return redirect()->route('books.index')->with('success', 'Livro devolvido com sucesso.');
    }
}
