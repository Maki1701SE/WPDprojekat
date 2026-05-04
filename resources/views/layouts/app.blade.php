<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

{{-- Navigacija --}}
<nav class="bg-blue-800 text-white px-6 py-4 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="text-xl font-bold">
            📚 Biblioteka
        </a>

        {{-- Linkovi --}}
        <div class="flex gap-6 items-center">
            <a href="{{ route('books.index') }}"
               class="hover:text-blue-200 transition">Knjige</a>
            <a href="{{ route('authors.index') }}"
               class="hover:text-blue-200 transition">Autori</a>
            <a href="{{ route('categories.index') }}"
               class="hover:text-blue-200 transition">Kategorije</a>
            <a href="{{ route('borrowings.index') }}"
               class="hover:text-blue-200 transition">Posudbe</a>

            {{-- Korisnik --}}
            <div class="flex items-center gap-4 ml-6 border-l border-blue-600 pl-6">
                <span class="text-blue-200 text-sm">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-500 px-3 py-1 rounded text-sm transition">
                        Odjava
                    </button>
                </form>
            </div>
        </div>

    </div>
</nav>

{{-- Flash poruke --}}
<div class="max-w-7xl mx-auto mt-4 px-6">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            ❌ {{ session('error') }}
        </div>
    @endif
</div>

{{-- Glavni sadržaj --}}
<main class="max-w-7xl mx-auto px-6 py-6">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="text-center text-gray-400 text-sm py-6 mt-10 border-t">
    © {{ date('Y') }} Biblioteka
</footer>

</body>
</html>
