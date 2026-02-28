<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Pesan Paket</h2>
    </x-slot>

    <div class="bg-white p-6 rounded shadow max-w-md">

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <h3 class="text-xl font-semibold mb-4">
            {{ $paket->nama }}
        </h3>

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf

            <input type="hidden" name="paket_id" value="{{ $paket->id }}">

            <label class="block mb-2">Pilih Tanggal</label>
            <input type="date"
                   name="tanggal"
                   required
                   class="border rounded w-full px-3 py-2 mb-4">

            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Lanjut ke Pembayaran
            </button>
        </form>

    </div>
</x-app-layout>