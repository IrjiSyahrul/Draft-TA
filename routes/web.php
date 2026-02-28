<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BookingController;
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
Route::view('/pembayaran', 'user.pembayaran.index')->name('pembayaran.index');
    Route::get('/booking/{paket}', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking/store', [BookingController::class, 'store'])
        ->name('booking.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

   Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

});

require __DIR__.'/auth.php';