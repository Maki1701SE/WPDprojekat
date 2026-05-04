@extends('layouts.app')

@section('title', 'Kategorije')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Kategorije</h1>
        <a href="{{ route('categories.create') }}"
           style="background-color: #1d4ed8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">
            + Dodaj kategoriju
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-800 text-white">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Naziv</th>
                <th class="px-6 py-3">Opis</th>
                <th class="px-6 py-3">Broj knjiga</th>
                <th class="px-6 py-3">Akcije</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $category->name }}</td>
                    <td class="px-6 py-4">{{ $category->description ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $category->books->count() }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('categories.edit', $category) }}"
                               style="background-color: #f59e0b; color: white; padding: 4px 12px; border-radius: 4px; font-size: 14px; text-decoration: none;">
                                Izmijeni
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                  onsubmit="return confirm('Da li ste sigurni?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background-color: #ef4444; color: white; padding: 4px 12px; border-radius: 4px; font-size: 14px; border: none; cursor: pointer;">
                                    Obriši
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                        Nema unesenih kategorija.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
