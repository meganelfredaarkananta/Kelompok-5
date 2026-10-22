<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Booking Sewa Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Booking Sewa Mobil & Motor</h2>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">+ Tambah Booking</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>No HP</th>
                        <th>Jenis</th>
                        <th>Kendaraan</th>
                        <th>Tgl Sewa</th>
                        <th>Lama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $b)
                        <tr>
                            <td>{{ $b->nama_pemesan }}</td>
                            <td>{{ $b->no_hp }}</td>
                            <td><span class="badge bg-info text-dark">{{ ucfirst($b->jenis_kendaraan) }}</span></td>
                            <td>{{ $b->nama_kendaraan }}</td>
                            <td>{{ $b->tanggal_sewa }}</td>
                            <td>{{ $b->lama_sewa }} Hari</td>
                            <td>
                                <span class="badge bg-{{ $b->status == 'menunggu' ? 'warning' : ($b->status == 'disetujui' ? 'success' : 'danger') }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('bookings.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('bookings.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data booking.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>