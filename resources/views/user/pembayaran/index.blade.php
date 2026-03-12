@extends('layouts.user')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Pembayaran
</h2>

<div class="bg-white shadow rounded-lg p-6">

    <!-- Filter Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">

        <input type="text"
               placeholder="Pilih Rentang Tanggal"
               class="border rounded px-4 py-2 w-full md:w-64 focus:ring focus:ring-blue-200">

        <input type="text"
               placeholder="No. Invoice"
               class="border rounded px-4 py-2 w-full md:w-64 focus:ring focus:ring-blue-200">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-6 py-3 border-b">No. Invoice</th>
                    <th class="px-6 py-3 border-b">Produk Pesanan</th>
                    <th class="px-6 py-3 border-b">Status</th>
                    <th class="px-6 py-3 border-b">Total</th>
                    <th class="px-6 py-3 border-b">Tanggal Pesanan Dibuat</th>
                    <th class="px-6 py-3 border-b">Tanggal Reservasi</th>
                    <th class="px-6 py-3 border-b">Jam Reservasi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

            @foreach($booking as $dataBooking)

            <tr class="hover:bg-gray-50">

                <td class="px-6 py-4 font-medium text-blue-600">
                    INV{{ str_pad($dataBooking->id, 5, '0', STR_PAD_LEFT) }}
                </td>

                <td class="px-6 py-4">
                    {{ $dataBooking->paket->nama ?? '-' }}
                </td>

                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                        {{ $dataBooking->transaksi->status }}
                    </span>
                </td>

                <td class="px-6 py-4">
                    Rp {{ number_format($dataBooking->transaksi->jumlah,0,',','.') }}
                </td>

                <td class="px-6 py-4">
                    {{ $dataBooking->created_at->format('d M Y') }}
                </td>

                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($dataBooking->tanggal_pesanan)->format('d M Y') }}
                </td>

                <td class="px-6 py-4">
                    {{ $dataBooking->jam_pesanan }}
                </td>

            </tr>

            @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection