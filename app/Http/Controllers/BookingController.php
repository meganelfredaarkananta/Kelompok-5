<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
        public function index()
        {
        $bookings = Booking::latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'jenis_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'tanggal_sewa' => 'required|date',
            'lama_sewa' => 'required|numeric',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan!');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'jenis_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
            'tanggal_sewa' => 'required|date',
            'lama_sewa' => 'required|numeric',
            'status' => 'required',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Data booking berhasil diperbarui!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Data booking berhasil dihapus!');
    }
    //
}
