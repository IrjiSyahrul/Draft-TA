@extends('layouts.user')

@section('content')

<section class="relative h-[90vh] flex items-center 
                rounded-3xl overflow-hidden mx-4 md:mx-8 lg:mx-16">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/studio.jpg') }}" 
             class="w-full h-full object-cover"
             alt="Studio">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-6xl px-5 text-white">
        <p class="uppercase tracking-widest text-sm mb-4">
            Professional Photo Studio
        </p>

        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
            Abadikan Momen <br>
            Berharga Anda dengan <br>
            <span class="text-gray-300">Sempurna</span>
        </h1>

        <p class="text-lg text-gray-200 mb-8">
            Studio foto profesional dengan peralatan lengkap,
            pencahayaan terbaik, dan tim fotografer berpengalaman
            untuk hasil yang memukau.
        </p>

            <div class="flex gap-4">
                <a href="#"
                class="bg-black text-white px-6 py-3 rounded-full hover:bg-gray-800 transition">
                    Booking Sekarang
                </a>

                <a href="#"
                class="bg-white text-black px-6 py-3 rounded-full hover:bg-gray-200 transition">
                    Lihat Layanan
                </a>
            </div>
    </div>

</section>


<section class="bg-gray-100 py-24">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-16">
            <p class="text-sm uppercase tracking-widest text-gray-500 mb-3">
                Layanan Kami
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Pilihan Paket <span class="text-black">Foto</span>
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Pilih paket foto yang sesuai dengan kebutuhan Anda. 
                Semua paket sudah termasuk peralatan studio dan editing profesional.
            </p>
        </div>

        {{-- Card Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Card 1 --}}
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden group">
                <div class="overflow-hidden">
                    <img src="{{ asset('images/portrait.jpg') }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Portrait Photo</h3>
                    <p class="text-gray-600 text-sm">
                        Cocok untuk personal branding, graduation, dan kebutuhan profesional.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden group">
                <div class="overflow-hidden">
                    <img src="{{ asset('images/family.jpg') }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Family Photo</h3>
                    <p class="text-gray-600 text-sm">
                        Abadikan momen bersama keluarga dengan hasil foto hangat dan natural.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden group">
                <div class="overflow-hidden">
                    <img src="{{ asset('images/product.jpg') }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Product Photo</h3>
                    <p class="text-gray-600 text-sm">
                        Tingkatkan penjualan dengan foto produk berkualitas tinggi dan profesional.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>
@endsection