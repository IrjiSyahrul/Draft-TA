<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen p-6">
            <h2 class="text-2xl font-bold mb-8">Studio Foto</h2>

            <nav class="space-y-4">

                <a href="{{ route('dashboard') }}"
                   class="block px-3 py-2 rounded 
                   {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    Dashboard
                </a>

                <a href="{{ route('paket.index') }}"
                   class="block px-3 py-2 rounded 
                   {{ request()->routeIs('paket.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    Lihat Paket Studio
                </a>

                <a href="{{ route('pembayaran.index') }}"
                   class="block px-3 py-2 rounded 
                   {{ request()->routeIs('pembayaran.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
                    Pembayaran
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="pt-6">
                    @csrf
                    <button type="submit" 
                        class="w-full text-left px-3 py-2 rounded hover:bg-red-600 bg-red-500">
                        Logout
                    </button>
                </form>

            </nav>
        </aside>

        <!-- Content Area -->
        <div class="flex-1">

            <!-- Optional Header -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="px-6 py-4">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Main Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>
