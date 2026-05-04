<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['book', 'user'])->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('borrowings.create', compact('books', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date|after:borrowed_at',
        ]);

        Borrowing::create($request->all());

        return redirect()->route('borrowings.index')
            ->with('success', 'Posudba je uspješno kreirana!');
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $users = User::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'users'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after:borrowed_at',
        ]);

        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')
            ->with('success', 'Posudba je uspješno izmjenjena!');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index')
            ->with('success', 'Posudba je uspješno obrisana!');
    }
}
