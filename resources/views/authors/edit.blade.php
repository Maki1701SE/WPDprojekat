@extends('layouts.app')

@section('title', 'Izmijeni autora')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Izmijeni autora</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('authors.update', $author) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Ime</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $author->first_name) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('first_name') border-red-500 @enderror">
                    @error('first_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Prezime</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $author->last_name) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('last_name') border-red-500 @enderror">
                    @error('last_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Datum rođenja</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $author->birth_date) }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Biografija</label>
                    <textarea name="bio" rows="4"
                              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('bio', $author->bio) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-700 hover:bg-blue-600 text-white px-6 py-2 rounded transition">
                        Sačuvaj izmjene
                    </button>
                    <a href="{{ route('authors.index') }}"
                       class="bg-gray-400 hover:bg-gray-300 text-white px-6 py-2 rounded transition">
                        Odustani
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
