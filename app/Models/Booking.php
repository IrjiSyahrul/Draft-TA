<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'paket_id',
        'tanggal_pesanan',
        'jam_pesanan',
        'status'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}