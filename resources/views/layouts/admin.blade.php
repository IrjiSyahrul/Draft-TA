<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar Admin -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-5">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>

        <ul class="space-y-3">
            <li><a href="/admin" class="hover:text-gray-300">Dashboard</a></li>
            <li><a href="#" class="hover:text-gray-300">Kelola Paket</a></li>
            <li><a href="#" class="hover:text-gray-300">Pembayaran</a></li>
            <li><a href="#" class="hover:text-gray-300">Keuangan</a></li>
        </ul>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        <div class="flex justify-end mb-4">
            {{ auth()->user()->name }}
            <form action="{{ route('logout') }}" method="POST" class="ml-3">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded text-white">
                    Logout
                </button>
            </form>
        </div>

        @yield('content')
    </main>

</body>
</html>