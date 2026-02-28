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
                    <th class="px-6 py-3 border-b">Status</th>
                    <th class="px-6 py-3 border-b">Total</th>
                    <th class="px-6 py-3 border-b">Tanggal Dibuat</th>
                    <th class="px-6 py-3 border-b">Batas Pembayaran</th>
                </tr>
            </thead>
            <tbody class="divide-y">

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-blue-600">
                        INV0012026
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                            Terbayar
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        Rp 500.000
                    </td>

                    <td class="px-6 py-4">
                        2026-02-25 15:00
                    </td>

                    <td class="px-6 py-4">
                        2026-02-26 15:00
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-blue-600">
                        INV0022026
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        Rp 300.000
                    </td>

                    <td class="px-6 py-4">
                        2026-02-24 10:00
                    </td>

                    <td class="px-6 py-4">
                        2026-02-25 10:00
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>

@endsection