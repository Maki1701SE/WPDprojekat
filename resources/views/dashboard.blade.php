@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-4xl mb-2">📚</div>
            <div class="text-3xl font-bold text-blue-800">{{ $totalBooks }}</div>
            <div class="text-gray-500 mt-1">Ukupno knjiga</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-4xl mb-2">✍️</div>
            <div class="text-3xl font-bold text-blue-800">{{ $totalAuthors }}</div>
            <div class="text-gray-500 mt-1">Autora</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-4xl mb-2">📂</div>
            <div class="text-3xl font-bold text-blue-800">{{ $totalCategories }}</div>
            <div class="text-gray-500 mt-1">Kategorija</div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <div class="text-4xl mb-2">🔄</div>
            <div class="text-3xl font-bold text-blue-800">{{ $totalBorrowings }}</div>
            <div class="text-gray-500 mt-1">Aktivnih posudbi</div>
        </div>

    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-700 mb-4">Dobrodošli, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-gray-500">Koristite navigaciju iznad za upravljanje bibliotekom.</p>
    </div>
@endsection
