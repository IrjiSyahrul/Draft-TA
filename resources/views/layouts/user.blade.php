<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav x-data="{ open: false }" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex justify-between items-center py-4">

                {{-- Logo --}}
                <a href="{{ route('dashboard') }}">
                    <h1 class="text-xl md:text-2xl font-bold">
                        YUNAS STUDIO
                    </h1>
                </a>

                {{-- Desktop Menu --}}
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
                    Pesanan
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 rounded-md bg-gray-600 text-white hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>

                {{-- Hamburger Button --}}
                <button @click="open = !open"
                        class="md:hidden focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>

            {{-- Mobile Menu --}}
            <div x-show="open" x-transition class="md:hidden pb-4 space-y-3">
                <a href="{{ route('dashboard') }}" class="block hover:text-blue-600">
                    Dashboard
                </a>
                <a href="{{ route('paket.index') }}" class="block hover:text-blue-600">
                    Paket
                </a>
                <a href="{{ route('pembayaran.index') }}" class="block hover:text-blue-600">
                    Pembayaran
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded-md bg-gray-600 text-white hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-grow w-full px-4 md:px-8 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white shadow-inner mt-12">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-10">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                {{-- Brand --}}
                <div>
                    <h2 class="text-lg md:text-xl font-bold mb-3">
                        YUNAS STUDIO
                    </h2>
                    <p class="text-gray-600 text-sm">
                        Rental Studio | Family | Prewedding | Group | Etc.<br>
                        Studio foto profesional untuk mengabadikan momen anda
                        dengan kualitas terbaik.
                    </p>
                </div>

                {{-- Navigation --}}
                <div>
                    <h3 class="font-semibold mb-3">Menu</h3>
                    <ul class="space-y-2 text-gray-600 text-sm">
                        <li><a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a></li>
                        <li><a href="{{ route('paket.index') }}" class="hover:text-blue-600">Paket</a></li>
                        <li><a href="{{ route('pembayaran.index') }}" class="hover:text-blue-600">Pembayaran</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="font-semibold mb-3">Kontak</h3>
                    <p class="text-gray-600 text-sm">Monday - Sunday : 10.00 - 18.00</p>
                    <p class="text-gray-600 text-sm">📍 Jalan Lingkar Selatan, Sukabumi</p>
                    <p class="text-gray-600 text-sm">📞 08xxxxxxxxxx</p>
                    <p class="text-gray-600 text-sm">✉ yunasstudio@email.com</p>
                </div>

            </div>

            <div class="border-t mt-8 pt-4 text-center text-sm text-gray-500">
                © {{ date('Y') }} YUNAS STUDIO. All rights reserved.
            </div>

        </div>
    </footer>

</body>
</html>