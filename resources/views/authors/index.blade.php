@extends('layouts.app')

@section('title', 'Autori')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Autori</h1>
        <a href="{{ route('authors.create') }}"
           class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
            + Dodaj autora
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-800 text-white">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Ime</th>
                <th class="px-6 py-3">Prezime</th>
                <th class="px-6 py-3">Datum rođenja</th>
                <th class="px-6 py-3">Akcije</th>
            </tr>
            </thead>
            <tbody>
            @forelse($authors as $author)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $author->first_name }}</td>
                    <td class="px-6 py-4">{{ $author->last_name }}</td>
                    <td class="px-6 py-4">{{ $author->birth_date ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('authors.edit', $author) }}"
                               style="background-color: #f59e0b; color: white; padding: 4px 12px; border-radius: 4px; font-size: 14px; text-decoration: none;">
                                Izmijeni
                            </a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST"
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
                        Nema unesenih autora.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
