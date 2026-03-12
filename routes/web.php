<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KelolaPaketController;
use App\Http\Controllers\JadwalController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/pembayaran', [BookingController::class, 'index'])->name('pembayaran.index');
    Route::get('/booking/{paket}', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking/store', [BookingController::class, 'store'])
        ->name('booking.store');
        
    // Pastikan URL ini sama dengan yang ada di fetch() JavaScript Anda
    Route::get('/jadwal-timeline/{tanggal}', [BookingController::class, 'getJadwalTimeline']);        


});


Route::middleware(['auth', 'role:admin'])->group(function () {

   Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

    
    //Kelola Paket
    Route::get('/kelolaPaket', [KelolaPaketController::class, 'getPaket'])->name('admin.paket.index');
    Route::post('/paket/store', [KelolaPaketController::class, 'store'])->name('paket.store');
    Route::get('/paket/{id}/edit', [KelolaPaketController::class, 'edit'])->name('paket.edit');
    Route::put('/paket/{id}', [KelolaPaketController::class, 'update'])->name('paket.update');
    Route::delete('/paket/{id}', [KelolaPaketController::class, 'destroy'])->name('paket.destroy');

    //Transaksi
    // Route::view('/transaksi', 'admin.keuangan')->name('admin.keuangan');
    Route::get('/transaksi', [TransaksiController::class, 'dataTransaksi']);

    //Jadwal
    Route::get('/jadwal', [JadwalController::class,'index'])->name('admin.jadwal');

    Route::get('/jadwal-calendar', [JadwalController::class,'calendar']);

    Route::get('/admin/jadwal-timeline/{tanggal}', [JadwalController::class,'timeline']);});

require __DIR__.'/auth.php';