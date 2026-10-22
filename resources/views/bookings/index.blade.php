@extends('layouts.app')

@section('title', 'Daftar Booking - RentWheels')

@section('content')

{{-- HERO BANNER --}}
<div class="page-hero">
    <div class="container-lg">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="hero-sub mb-1">
                    <i class="bi bi-house-door me-1"></i> Dashboard
                </p>
                <h1 class="hero-title mb-0">
                    <i class="bi bi-calendar2-check me-2" style="font-size:1.4rem;"></i>
                    Daftar Booking Kendaraan
                </h1>
                <p class="hero-sub mb-0 mt-2">Pantau dan kelola seluruh penyewaan kendaraan Anda.</p>
            </div>
            <a href="{{ route('bookings.create') }}" class="btn-primary-custom btn-hero">
                <i class="bi bi-plus-lg"></i> Tambah Booking
            </a>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container-lg">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert-custom alert-success-custom mb-4">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- STAT CARDS --}}
        @php
            $total     = $bookings->count();
            $menunggu  = $bookings->where('status','menunggu')->count();
            $disetujui = $bookings->where('status','disetujui')->count();
            $selesai   = $bookings->where('status','selesai')->count();
        @endphp

        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-collection-fill"></i></div>
                    <div>
                        <div class="stat-label">Total Booking</div>
                        <div class="stat-value">{{ $total }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon yellow"><i class="bi bi-clock-fill"></i></div>
                    <div>
                        <div class="stat-label">Menunggu</div>
                        <div class="stat-value">{{ $menunggu }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon green"><i class="bi bi-check-circle-fill"></i></div>
                    <div>
                        <div class="stat-label">Disetujui</div>
                        <div class="stat-value">{{ $disetujui }}</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-flag-fill"></i></div>
                    <div>
                        <div class="stat-label">Selesai</div>
                        <div class="stat-value">{{ $selesai }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABLE CARD --}}
        <div class="table-card">
            <div class="table-card-header">
                <div>
                    <div class="table-card-title">
                        <span class="table-heading-icon">
                            <i class="bi bi-table"></i>
                        </span>
                        Semua Data Booking
                    </div>
                    <p class="table-card-subtitle">Informasi penyewa, kendaraan, dan status pesanan.</p>
                </div>
                <span class="table-count">
                    <i class="bi bi-collection"></i>
                    <strong>{{ $bookings->count() }}</strong> data
                </span>
            </div>

            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="bi bi-person me-1"></i>Nama Pemesan</th>
                            <th><i class="bi bi-telephone me-1"></i>No HP</th>
                            <th><i class="bi bi-tag me-1"></i>Jenis</th>
                            <th><i class="bi bi-car-front me-1"></i>Kendaraan</th>
                            <th><i class="bi bi-calendar me-1"></i>Tgl Sewa</th>
                            <th><i class="bi bi-clock me-1"></i>Lama</th>
                            <th><i class="bi bi-circle-half me-1"></i>Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $i => $b)
                        <tr>
                            <td style="color:var(--text-muted);font-size:0.78rem;font-weight:600;">{{ $i + 1 }}</td>
                            <td>
                                <div style="font-weight:600;">{{ $b->nama_pemesan }}</div>
                            </td>
                            <td style="color:var(--text-secondary);">{{ $b->no_hp }}</td>
                            <td>
                                <span class="badge-jenis {{ $b->jenis_kendaraan }}">
                                    <i class="bi bi-{{ $b->jenis_kendaraan == 'mobil' ? 'car-front' : 'bicycle' }}"></i>
                                    {{ ucfirst($b->jenis_kendaraan) }}
                                </span>
                            </td>
                            <td style="font-weight:500;">{{ $b->nama_kendaraan }}</td>
                            <td style="color:var(--text-secondary);">
                                <i class="bi bi-calendar3 me-1" style="color:var(--text-muted);"></i>
                                {{ \Carbon\Carbon::parse($b->tanggal_sewa)->format('d M Y') }}
                            </td>
                            <td>
                                <span style="background:#f1f5f9;color:#475569;padding:3px 10px;border-radius:6px;font-size:0.78rem;font-weight:600;">
                                    {{ $b->lama_sewa }} Hari
                                </span>
                            </td>
                            <td>
                                @php
                                    $statusMap = [
                                        'menunggu'  => ['icon'=>'clock-fill',       'label'=>'Menunggu'],
                                        'disetujui' => ['icon'=>'check-circle-fill', 'label'=>'Disetujui'],
                                        'selesai'   => ['icon'=>'flag-fill',         'label'=>'Selesai'],
                                        'batal'     => ['icon'=>'x-circle-fill',     'label'=>'Batal'],
                                    ];
                                    $s = $statusMap[$b->status] ?? ['icon'=>'circle','label'=>ucfirst($b->status)];
                                @endphp
                                <span class="badge-status {{ $b->status }}">
                                    <i class="bi bi-{{ $s['icon'] }}"></i>
                                    {{ $s['label'] }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('bookings.edit', $b->id) }}" class="btn-action edit" title="Edit Booking">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="{{ route('bookings.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="Hapus Booking">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="empty-state">
                                    <i class="bi bi-inbox" style="color:#cbd5e1;"></i>
                                    <div style="font-size:1rem;font-weight:600;color:#94a3b8;margin-bottom:6px;">Belum ada data booking</div>
                                    <p style="font-size:0.85rem;color:#cbd5e1;margin:0;">Klik tombol <strong>Tambah Booking</strong> untuk memulai.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
