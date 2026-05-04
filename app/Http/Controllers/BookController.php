<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|unique:books,isbn',
            'year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspješno dodana!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|unique:books,isbn,' . $book->id,
            'year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspješno izmjenjena!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspješno obrisana!');
    }
}
