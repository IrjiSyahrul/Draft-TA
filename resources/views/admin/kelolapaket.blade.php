@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Pembayaran
</h2>

<div class="bg-white shadow rounded-lg p-6">

    <!-- Button Tambah -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <button onclick="showForm()" 
            class="bg-violet-500 hover:bg-violet-600 text-white px-4 py-2 rounded">
            Tambah Data
        </button>
    </div>

    <!-- Form Tambah Data (Hidden) -->
    <div id="formData" class="hidden mb-6 border p-4 rounded-lg bg-gray-50">
        <form action="{{ route('paket.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="block font-medium">Nama Paket</label>
                <input type="text" name="nama" class="border p-2 w-full rounded">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="border p-2 w-full rounded"></textarea>
            </div>

            <div class="mb-3">
                <label class="block font-medium">Harga</label>
                <input type="number" name="harga" class="border p-2 w-full rounded">
            </div>

            <div class="mb-3">
                <label class="block font-medium">Durasi</label>
                <input type="text" name="durasi" class="border p-2 w-full rounded">
            </div>

            <button type="submit" 
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-6 py-3 border-b">No.</th>
                    <th class="px-6 py-3 border-b">Nama Paket</th>
                    <th class="px-6 py-3 border-b">Deskripsi</th>
                    <th class="px-6 py-3 border-b">Harga</th>
                    <th class="px-6 py-3 border-b">Durasi</th>
                    <th class="px-6 py-3 border-b">Edit</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($dataPaketAdmin as $dataPaket)
                <tr>
                    <td class="px-6 py-4">{{ $dataPaket->id }}</td>
                    <td class="px-6 py-4">{{ $dataPaket->nama }}</td>
                    <td class="px-6 py-4">{{ $dataPaket->deskripsi }}</td>
                    <td class="px-6 py-4">Rp. {{ $dataPaket->harga }}</td>
                    <td class="px-6 py-4">{{ $dataPaket->durasi }}</td>
                    <td class="px-6 py-4 flex gap-2">

    <!-- Edit -->
    <a href="{{ route('paket.edit', $dataPaket->id) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
        Edit
    </a>

    <!-- Delete -->
    <form action="{{ route('paket.destroy', $dataPaket->id) }}" method="POST"
        onsubmit="return confirm('Yakin ingin menghapus data ini?')">   
        @csrf
        @method('DELETE')

        <button type="submit"
            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
            Delete
        </button>
    </form>
</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

<!-- Javascript -->
<script>
function showForm() {
    document.getElementById("formData").classList.toggle("hidden");
}
</script>

@endsection