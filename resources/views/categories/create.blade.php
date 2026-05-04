@extends('layouts.app')

@section('title', 'Dodaj kategoriju')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Dodaj kategoriju</h1>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Naziv</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400
                           @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Opis</label>
                    <textarea name="description" rows="4"
                              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description') }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            style="background-color: #1d4ed8; color: white; padding: 8px 24px; border-radius: 4px; border: none; cursor: pointer;">
                        Sačuvaj
                    </button>
                    <a href="{{ route('categories.index') }}"
                       style="background-color: #9ca3af; color: white; padding: 8px 24px; border-radius: 4px; text-decoration: none;">
                        Odustani
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
