@extends('layouts.user')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
            <span class="bg-blue-600 w-2 h-8 rounded-full mr-3"></span>
            Booking Paket {{ $paket->nama }}
        </h2>

        <form action="{{ route('booking.store') }}" method="POST" id="formBooking">
            @csrf
            <input type="hidden" name="paket_id" value="{{ $paket->id }}">
            
            <input type="hidden" name="jam_pesanan" id="jam_pesanan_hidden" required>

            <div class="mb-6">
                <label for="tanggal" class="block mb-2 font-semibold text-gray-700">
                    Pilih Tanggal
                </label>
                <input 
                    type="date"
                    id="tanggal"
                    name="tanggal_pesanan"
                    min="{{ date('Y-m-d') }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
                    required
                >
            </div>

            <div class="mb-6">
                <label for="jam_pesanan_hidden" class="block mb-3 font-semibold text-gray-700">
                    Pilih Jam Foto
                </label>
                
                <p id="placeholder-text" class="text-gray-500 italic text-sm mb-3">
                    Silakan pilih tanggal terlebih dahulu untuk melihat jam yang tersedia.
                </p>

                <div id="jamContainer" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    </div>
            </div>

            <button
                type="submit"
                id="btnSubmit"
                disabled
                class="w-full py-4 bg-gray-400 text-white rounded-xl transition font-bold uppercase tracking-wide cursor-not-allowed shadow-md"
            >
                Pilih Jam Dahulu
            </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script>
document.addEventListener("DOMContentLoaded", () => {

    const tanggalInput = document.getElementById("tanggal");
    const container = document.getElementById("jamContainer");
    const placeholder = document.getElementById("placeholder-text");
    const jamHidden = document.getElementById("jam_pesanan_hidden");
    const btnSubmit = document.getElementById("btnSubmit");

    let selectedJam = null;

    function resetButton() {
        btnSubmit.disabled = true;
        btnSubmit.innerText = "Pilih Jam Dahulu";
        btnSubmit.className =
            "w-full py-4 bg-gray-400 text-white rounded-xl transition font-bold uppercase tracking-wide cursor-not-allowed shadow-md";
    }

    function activateButton() {
        btnSubmit.disabled = false;
        btnSubmit.innerText = "Booking Sekarang";
        btnSubmit.className =
            "w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition font-bold uppercase tracking-wide shadow-md";
    }

    function renderJam(slots) {

        container.innerHTML = "";
        placeholder.classList.add("hidden");

        slots.forEach(slot => {

            const jam = slot.jam;
            const total = slot.total;
            const isFull = slot.full;
            const isSelected = selectedJam === jam;

            const div = document.createElement("div");

            const baseClass =
                "p-4 text-center rounded-xl border-2 transition-all duration-200 shadow-sm";

            if (isFull) {
                div.className =
                    baseClass +
                    " bg-gray-50 text-gray-400 border-gray-100 cursor-not-allowed";
            }
            else if (isSelected) {
                div.className =
                    baseClass +
                    " bg-blue-50 text-blue-700 border-blue-600 ring-4 ring-blue-100 cursor-pointer";
            }
            else {
                div.className =
                    baseClass +
                    " bg-white text-gray-700 border-gray-100 hover:border-blue-300 hover:bg-blue-50 cursor-pointer";
            }

            div.innerHTML = `
                <div class="text-lg font-bold">${jam}</div>
                <div class="text-xs uppercase mt-1 font-medium">
                    ${isFull ? 'FULL' : total + '/4 Slot'}
                </div>
            `;

            if (!isFull) {
                div.addEventListener("click", () => {

                    selectedJam = jam;
                    jamHidden.value = jam;

                    activateButton();

                    renderJam(slots);
                });
            }

            container.appendChild(div);
        });
    }

    tanggalInput.addEventListener("change", async function () {

        const tanggal = this.value;
        if (!tanggal) return;

        selectedJam = null;
        jamHidden.value = "";

        resetButton();

        container.innerHTML =
            "<p class='col-span-full text-center text-blue-600 animate-pulse'>Mengecek jadwal...</p>";

        try {

            const response = await fetch(`/jadwal-timeline/${tanggal}`);

            if (!response.ok) {
                throw new Error("Gagal mengambil jadwal");
            }

            const data = await response.json();

            renderJam(data);

        } catch (error) {

            console.error(error);

            container.innerHTML =
                "<p class='col-span-full text-center text-red-500'>Gagal memuat jadwal.</p>";
        }
    });

});
</script>

@endsection

