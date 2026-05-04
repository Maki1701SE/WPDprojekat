<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'totalBooks' => \App\Models\Book::count(),
            'totalAuthors' => \App\Models\Author::count(),
            'totalCategories' => \App\Models\Category::count(),
            'totalBorrowings' => \App\Models\Borrowing::whereNull('returned_at')->count(),
        ]);
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Autori
    Route::resource('authors', AuthorController::class);

    // Kategorije
    Route::resource('categories', CategoryController::class);

    // Knjige
    Route::resource('books', BookController::class);

    // Posudbe
    Route::resource('borrowings', BorrowingController::class);
});

require __DIR__.'/auth.php';
