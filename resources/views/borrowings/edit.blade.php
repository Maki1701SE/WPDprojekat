@extends('layouts.app')

@section('title', 'Izmijeni posudbu')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Izmijeni posudbu</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Knjiga</label>
                    <select name="book_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Odaberi knjigu --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}"
                                {{ old('book_id', $borrowing->book_id) == $book->id ? 'selected' : '' }}>
                                {{ $book->title }} ({{ $book->author->full_name }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Korisnik</label>
                    <select name="user_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Odaberi korisnika --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $borrowing->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Datum posudbe</label>
                    <input type="date" name="borrowed_at"
                           value="{{ old('borrowed_at', $borrowing->borrowed_at->format('Y-m-d')) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Rok vraćanja</label>
                    <input type="date" name="due_date"
                           value="{{ old('due_date', $borrowing->due_date->format('Y-m-d')) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Datum vraćanja</label>
                    <input type="date" name="returned_at"
                           value="{{ old('returned_at', $borrowing->returned_at ? $borrowing->returned_at->format('Y-m-d') : '') }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <p class="text-gray-400 text-sm mt-1">Ostavite prazno ako knjiga još nije vraćena.</p>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            style="background-color: #1d4ed8; color: white; padding: 8px 24px; border-radius: 4px; border: none; cursor: pointer;">
                        Sačuvaj izmjene
                    </button>
                    <a href="{{ route('borrowings.index') }}"
                       style="background-color: #9ca3af; color: white; padding: 8px 24px; border-radius: 4px; text-decoration: none;">
                        Odustani
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
