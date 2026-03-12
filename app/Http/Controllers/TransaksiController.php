<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Paket;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function dataTransaksi()
    {
        $transaksi = Transaksi::all();
        return view('admin.keuangan', compact('transaksi'));
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
        'status' => 'pending',
    ]);

    return redirect()->route('pembayaran.index');
    }
}