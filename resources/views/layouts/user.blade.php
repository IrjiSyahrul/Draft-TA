<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-white shadow p-5">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold",>YUNAS STUDIO</h1>
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}"
                class="relative group font-medium text-gray-700">
                    Dashboard
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="{{ route('paket.index') }}"
                class="relative group font-medium text-gray-700">
                    Paket
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a href="{{ route('pembayaran.index') }}"
                class="relative group font-medium text-gray-700">
                    Pembayaran
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                <!-- Logout Button -->
                 <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-3 py-2 rounded-md font-medium bg-red-500 text-white hover:bg-red-600 transition duration-300">
                    Logout
                </button>
            </form>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div class="container mx-auto py-6">
        @yield('content')
    </div>


    {{-- Footer --}}

    <footer class="bg-white shadow-inner mt-12">
    <div class="container mx-auto px-6 py-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Brand -->
            <div>
                <h2 class="text-xl font-bold mb-3">YUNAS STUDIO</h2>
                <p class="text-gray-600 text-sm">
                    Studio profesional untuk recording, rehearsal, dan produksi audio
                    dengan kualitas terbaik.
                </p>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="font-semibold mb-3">Menu</h3>
                <ul class="space-y-2 text-gray-600 text-sm">
                    <li>
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('paket.index') }}" class="hover:text-blue-600 transition">
                            Paket
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembayaran.index') }}" class="hover:text-blue-600 transition">
                            Pembayaran
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold mb-3">Kontak</h3>
                <p class="text-gray-600 text-sm">
                    📍 Pasartanahtinggi, Indonesia
                </p>
                <p class="text-gray-600 text-sm">
                    📞 08xxxxxxxxxx
                </p>
                <p class="text-gray-600 text-sm">
                    ✉ yunasstudio@email.com
                </p>
            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t mt-8 pt-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} YUNAS STUDIO. All rights reserved.
        </div>

    </div>
</footer>
</body>
</html>