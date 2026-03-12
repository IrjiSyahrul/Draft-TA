<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'invoice',
        'status',
        'jumlah',
        'batas_pembayaran',
        'booking_id',
        'tanggal',

    ];

    public function booking(){
    return $this->belongsTo(Booking::class);
}
}