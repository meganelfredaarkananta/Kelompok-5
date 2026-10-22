<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Halaman utama otomatis diarahkan ke daftar booking
Route::get('/', function () {
    return redirect()->route('bookings.index');
});

// Kumpulan Route Sistem Booking Sewa Kendaraan
Route::prefix('bookings')->name('bookings.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/{booking}/edit', [BookingController::class, 'edit'])->name('edit');
    Route::put('/{booking}', [BookingController::class, 'update'])->name('update');
    Route::delete('/{booking}', [BookingController::class, 'destroy'])->name('destroy');
});