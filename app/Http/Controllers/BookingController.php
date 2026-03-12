<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Booking;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB; // Untuk transaksi database

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::with(['paket', 'transaksi'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.pembayaran.index', compact('booking'));
    }

    public function create(Paket $paket)
    {
        return view('user.booking.create', compact('paket'));
    }

    /**
     * FUNGSI BARU: Untuk melayani AJAX dari tampilan
     */
    public function getJadwalTimeline($tanggal)
{
    $slots = $this->generateTimeSlots();

    $bookings = Booking::where('tanggal_pesanan',$tanggal)
        ->where('status','!=','cancelled')
        ->select('jam_pesanan', DB::raw('count(*) as total'))
        ->groupBy('jam_pesanan')
        ->get()
        ->keyBy('jam_pesanan');

    $result = [];

    foreach($slots as $slot){

        $total = $bookings[$slot]->total ?? 0;

        $result[] = [
            'jam' => $slot,
            'total' => $total,
            'full' => $total >= 4
        ];
    }

    return response()->json($result);
}

    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_pesanan' => 'required|date|after_or_equal:today',
            'jam_pesanan' => 'required'
        ]);

        // Cek kembali di sisi server untuk menghindari "balapan" klik (race condition)
        $cek = Booking::where('tanggal_pesanan', $request->tanggal_pesanan)
            ->where('jam_pesanan', $request->jam_pesanan)
            ->exists();

        if ($cek) {
            return back()->with('error', 'Maaf, slot waktu baru saja dibooking orang lain!');
        }

        try {
            // Gunakan Transaction agar jika salah satu gagal, semua dibatalkan (aman)
            DB::beginTransaction();

            $paket = Paket::findOrFail($request->paket_id);

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'paket_id' => $request->paket_id,
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'jam_pesanan' => $request->jam_pesanan,
                'status' => 'pending'
            ]);

            Transaksi::create([
                'booking_id' => $booking->id,
                'jumlah' => $paket->harga, // Ambil harga langsung dari model Paket
                'status' => 'pending'
            ]);

            DB::commit();

            return redirect()->route('pembayaran.index')
                ->with('success', 'Booking berhasil dibuat, silakan lakukan pembayaran.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    private function generateTimeSlots($start = '08:00', $end = '17:00', $interval = 60)
{
    $slots = [];

    $startTime = strtotime($start);
    $endTime = strtotime($end);

    while ($startTime < $endTime) {
        $slots[] = date('H:i', $startTime);
        $startTime = strtotime("+{$interval} minutes", $startTime);
    }

    return $slots;
}
}