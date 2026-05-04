@extends('layouts.app')

@section('title', 'Izmijeni knjigu')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Izmijeni knjigu</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Naziv knjige</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('title') border-red-500 @enderror">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Autor</label>
                    <select name="author_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Odaberi autora --</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Kategorija</label>
                    <select name="category_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Odaberi kategoriju --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">ISBN</label>
                    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Godina izdanja</label>
                    <input type="number" name="year" value="{{ old('year', $book->year) }}"
                           min="1000" max="{{ date('Y') }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Količina</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}"
                           min="1"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Opis</label>
                    <textarea name="description" rows="4"
                              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            style="background-color: #1d4ed8; color: white; padding: 8px 24px; border-radius: 4px; border: none; cursor: pointer;">
                        Sačuvaj izmjene
                    </button>
                    <a href="{{ route('books.index') }}"
                       style="background-color: #9ca3af; color: white; padding: 8px 24px; border-radius: 4px; text-decoration: none;">
                        Odustani
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
