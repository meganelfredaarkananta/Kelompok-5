@extends('layouts.app')

@section('title', 'Edit Booking - RentWheels')

@section('content')

{{-- HERO --}}
<div class="page-hero">
    <div class="container-lg">
        <p class="hero-sub mb-1">
            <a href="{{ route('bookings.index') }}" style="color:rgba(255,255,255,0.7);text-decoration:none;">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </p>
        <h1 class="hero-title mb-0">
            <i class="bi bi-pencil-square me-2" style="font-size:1.4rem;"></i>
            Edit Data Booking
        </h1>
    </div>
</div>

<div class="main-content">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xl-6">

                {{-- INFO BANNER --}}
                <div style="background:#fff7ed;border:1px solid #fed7aa;border-radius:12px;padding:12px 16px;margin-bottom:20px;display:flex;align-items:center;gap:10px;font-size:0.85rem;color:#9a3412;">
                    <i class="bi bi-info-circle-fill" style="font-size:1.1rem;color:#ea580c;"></i>
                    <span>Anda sedang mengedit booking atas nama <strong>{{ $booking->nama_pemesan }}</strong></span>
                </div>

                <div class="form-card">
                    <div class="form-card-header">
                        <h4>
                            <span class="header-icon" style="background:#fef3c7;color:#d97706;">
                                <i class="bi bi-pencil-fill"></i>
                            </span>
                            Perbarui Data Booking
                        </h4>
                    </div>

                    <div class="form-card-body">
                        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                {{-- Nama Pemesan --}}
                                <div class="col-12">
                                    <label class="form-label-custom">
                                        <i class="bi bi-person-fill me-1"></i>Nama Pemesan
                                    </label>
                                    <input
                                        type="text"
                                        name="nama_pemesan"
                                        class="form-control-custom"
                                        value="{{ old('nama_pemesan', $booking->nama_pemesan) }}"
                                        required
                                    >
                                </div>

                                {{-- No HP --}}
                                <div class="col-12">
                                    <label class="form-label-custom">
                                        <i class="bi bi-telephone-fill me-1"></i>Nomor HP / WhatsApp
                                    </label>
                                    <input
                                        type="text"
                                        name="no_hp"
                                        class="form-control-custom"
                                        value="{{ old('no_hp', $booking->no_hp) }}"
                                        required
                                    >
                                </div>

                                {{-- Jenis Kendaraan --}}
                                <div class="col-12">
                                    <label class="form-label-custom">
                                        <i class="bi bi-tags-fill me-1"></i>Jenis Kendaraan
                                    </label>
                                    <select name="jenis_kendaraan" class="form-select-custom" required>
                                        <option value="mobil" {{ (old('jenis_kendaraan', $booking->jenis_kendaraan) == 'mobil') ? 'selected' : '' }}>
                                            🚗  Mobil
                                        </option>
                                        <option value="motor" {{ (old('jenis_kendaraan', $booking->jenis_kendaraan) == 'motor') ? 'selected' : '' }}>
                                            🏍️  Motor
                                        </option>
                                    </select>
                                </div>

                                {{-- Nama Kendaraan --}}
                                <div class="col-12">
                                    <label class="form-label-custom">
                                        <i class="bi bi-car-front-fill me-1"></i>Nama Kendaraan / Tipe Unit
                                    </label>
                                    <input
                                        type="text"
                                        name="nama_kendaraan"
                                        class="form-control-custom"
                                        value="{{ old('nama_kendaraan', $booking->nama_kendaraan) }}"
                                        required
                                    >
                                </div>

                                {{-- Tanggal & Lama --}}
                                <div class="col-sm-6">
                                    <label class="form-label-custom">
                                        <i class="bi bi-calendar-event-fill me-1"></i>Tanggal Sewa
                                    </label>
                                    <input
                                        type="date"
                                        name="tanggal_sewa"
                                        class="form-control-custom"
                                        value="{{ old('tanggal_sewa', $booking->tanggal_sewa) }}"
                                        required
                                    >
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label-custom">
                                        <i class="bi bi-hourglass-split me-1"></i>Lama Sewa (Hari)
                                    </label>
                                    <input
                                        type="number"
                                        name="lama_sewa"
                                        class="form-control-custom"
                                        min="1"
                                        value="{{ old('lama_sewa', $booking->lama_sewa) }}"
                                        required
                                    >
                                </div>

                                {{-- Status --}}
                                <div class="col-12">
                                    <label class="form-label-custom">
                                        <i class="bi bi-circle-half me-1"></i>Status Booking
                                    </label>
                                    <select name="status" class="form-select-custom">
                                        <option value="menunggu"  {{ (old('status', $booking->status) == 'menunggu')  ? 'selected' : '' }}>⏳ Menunggu</option>
                                        <option value="disetujui" {{ (old('status', $booking->status) == 'disetujui') ? 'selected' : '' }}>✅ Disetujui</option>
                                        <option value="selesai"   {{ (old('status', $booking->status) == 'selesai')   ? 'selected' : '' }}>🏁 Selesai</option>
                                        <option value="batal"     {{ (old('status', $booking->status) == 'batal')     ? 'selected' : '' }}>❌ Batal</option>
                                    </select>
                                </div>

                                {{-- ACTION BUTTONS --}}
                                <div class="col-12 d-flex gap-3 mt-2">
                                    <button type="submit" class="btn-primary-custom flex-fill justify-content-center">
                                        <i class="bi bi-save-fill"></i> Simpan Perubahan
                                    </button>
                                    <a href="{{ route('bookings.index') }}"
                                       style="flex:1;display:inline-flex;align-items:center;justify-content:center;gap:7px;
                                              padding:10px 20px;border-radius:10px;border:1.5px solid #e2e8f0;
                                              color:#64748b;font-size:0.875rem;font-weight:600;text-decoration:none;
                                              transition:all 0.2s;background:#f8fafc;"
                                       onmouseover="this.style.background='#f1f5f9'"
                                       onmouseout="this.style.background='#f8fafc'">
                                        <i class="bi bi-x-lg"></i> Batal
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
