@extends('layouts.user')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Katalog Paket Studio
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach($pakets as $paket)
        <div class="bg-white shadow rounded-lg p-6">

            <h3 class="text-xl font-semibold mb-2">
                {{ $paket->nama }}
            </h3>

            <p class="text-gray-600 mb-4">
                {{ $paket->deskripsi }}
            </p>

            <p class="font-bold text-lg mb-2">
                Rp {{ number_format($paket->harga) }}
            </p>

            <p class="text-sm text-gray-500 mb-4">
                Durasi: {{ $paket->durasi }}
            </p>

            <a href="{{ route('booking.create', $paket->id) }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded transition duration-300 hover:bg-green-700">
                Pesan Sekarang
            </a>

        </div>
    @endforeach

</div>

@endsection