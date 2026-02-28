<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Booking;

class BookingController extends Controller{

public function create(Paket $paket){
    return view('booking.create', compact('paket'));
}

public function store(Request $request){
    $request->validate([
        'paket_id' => 'required',
        'tanggal' => 'required|date'
    ]);

    // cek apakah sudah ada booking di tanggal tersebut
    $cek = Booking::where('tanggal', $request->tanggal)->exists();

    if ($cek) {
        return back()->with('error', 'Tanggal sudah dibooking!');
    }

    Booking::create([
        'user_id' => auth()->id(),
        'paket_id' => $request->paket_id,
        'tanggal' => $request->tanggal,
        'status' => 'pending'
    ]);

    return redirect()->route('pembayaran.index');
    }
}

