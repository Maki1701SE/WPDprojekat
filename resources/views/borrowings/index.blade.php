@extends('layouts.app')

@section('title', 'Posudbe')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">Posudbe</h1>
        <a href="{{ route('borrowings.create') }}"
           style="background-color: #1d4ed8; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">
            + Nova posudba
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-800 text-white">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Knjiga</th>
                <th class="px-6 py-3">Korisnik</th>
                <th class="px-6 py-3">Datum posudbe</th>
                <th class="px-6 py-3">Rok vraćanja</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Akcije</th>
            </tr>
            </thead>
            <tbody>
            @forelse($borrowings as $borrowing)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $borrowing->book->title }}</td>
                    <td class="px-6 py-4">{{ $borrowing->user->name }}</td>
                    <td class="px-6 py-4">{{ $borrowing->borrowed_at->format('d.m.Y') }}</td>
                    <td class="px-6 py-4">{{ $borrowing->due_date->format('d.m.Y') }}</td>
                    <td class="px-6 py-4">
                        @if($borrowing->returned_at)
                            <span style="background-color: #d1fae5; color: #065f46; padding: 2px 10px; border-radius: 999px; font-size: 13px;">
                                    Vraćeno
                                </span>
                        @elseif($borrowing->due_date < now())
                            <span style="background-color: #fee2e2; color: #991b1b; padding: 2px 10px; border-radius: 999px; font-size: 13px;">
                                    Kasni
                                </span>
                        @else
                            <span style="background-color: #fef9c3; color: #854d0e; padding: 2px 10px; border-radius: 999px; font-size: 13px;">
                                    Aktivno
                                </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('borrowings.edit', $borrowing) }}"
                               style="background-color: #f59e0b; color: white; padding: 4px 12px; border-radius: 4px; font-size: 14px; text-decoration: none;">
                                Izmijeni
                            </a>
                            <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST"
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
                        Nema aktivnih posudbi.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
