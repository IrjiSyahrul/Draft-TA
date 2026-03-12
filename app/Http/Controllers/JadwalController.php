<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class JadwalController extends Controller
{

    public function index()
    {
        return view('admin.jadwal');
    }

    public function calendar()
    {
        $bookings = Booking::with('paket')->get();

        $events = [];

        foreach ($bookings as $booking) {

            $events[] = [
                'title' => $booking->paket->nama,
                'start' => $booking->tanggal_pesanan,
                'color' => $booking->status == 'pending' ? 'orange' : 'red'
            ];
        }

        return response()->json($events);
    }

    public function timeline($tanggal)
    {
        $bookings = Booking::where('tanggal_pesanan', $tanggal)
            ->get(['jam_pesanan']);

        return response()->json(
            $bookings->map(function ($booking) {
                return [
                    'jam_pesanan' => substr($booking->jam_pesanan, 0, 5)
                ];
            })
        );
    }

}