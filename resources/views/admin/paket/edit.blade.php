@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Edit Paket
</h2>

<div class="bg-white shadow rounded-lg p-6 max-w-xl">

    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Paket -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Nama Paket</label>
            <input type="text" name="nama"
                value="{{ $paket->nama }}"
                class="border p-2 w-full rounded">
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                class="border p-2 w-full rounded">{{ $paket->deskripsi }}</textarea>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Harga</label>
            <input type="number" name="harga"
                value="{{ $paket->harga }}"
                class="border p-2 w-full rounded">
        </div>

        <!-- Durasi -->
        <div class="mb-4">
            <label class="block font-medium mb-1">Durasi</label>
            <input type="text" name="durasi"
                value="{{ $paket->durasi }}"
                class="border p-2 w-full rounded">
        </div>

        <!-- Button -->
        <div class="flex gap-3">

            <button type="submit"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('admin.paket.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection