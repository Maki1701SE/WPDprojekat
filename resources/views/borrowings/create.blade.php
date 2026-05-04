@extends('layouts.app')

@section('title', 'Nova posudba')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Nova posudba</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('borrowings.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Knjiga</label>
                    <select name="book_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                            @error('book_id') border-red-500 @enderror">
                        <option value="">-- Odaberi knjigu --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}"
                                {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }} ({{ $book->author->full_name }})
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Korisnik</label>
                    <select name="user_id"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                            @error('user_id') border-red-500 @enderror">
                        <option value="">-- Odaberi korisnika --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Datum posudbe</label>
                    <input type="date" name="borrowed_at" value="{{ old('borrowed_at', date('Y-m-d')) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('borrowed_at') border-red-500 @enderror">
                    @error('borrowed_at')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Rok vraćanja</label>
                    <input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+14 days'))) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('due_date') border-red-500 @enderror">
                    @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            style="background-color: #1d4ed8; color: white; padding: 8px 24px; border-radius: 4px; border: none; cursor: pointer;">
                        Sačuvaj
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
