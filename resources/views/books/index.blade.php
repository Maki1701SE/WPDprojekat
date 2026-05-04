@extends('layouts.app')

@section('title', 'Knjige')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Knjige</h1>
        <a href="{{ route('books.create') }}"
           style="background-color: #1d4ed8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">
            + Dodaj knjigu
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-800 text-white">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Naziv</th>
                <th class="px-6 py-3">Autor</th>
                <th class="px-6 py-3">Kategorija</th>
                <th class="px-6 py-3">Godina</th>
                <th class="px-6 py-3">Količina</th>
                <th class="px-6 py-3">Akcije</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $book->title }}</td>
                    <td class="px-6 py-4">{{ $book->author->full_name }}</td>
                    <td class="px-6 py-4">{{ $book->category->name }}</td>
                    <td class="px-6 py-4">{{ $book->year ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $book->quantity }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('books.edit', $book) }}"
                               style="background-color: #f59e0b; color: white; padding: 4px 12px; border-radius: 4px; font-size: 14px; text-decoration: none;">
                                Izmijeni
                            </a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST"
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
                    <td colspan="7" class="px-6 py-4 text-center text-gray-400">
                        Nema unesenih knjiga.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
