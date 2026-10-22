<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Data Booking</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" value="{{ $booking->nama_pemesan }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nomor HP / WhatsApp</label>
                    <input type="text" name="no_hp" value="{{ $booking->no_hp }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" class="form-select" required>
                        <option value="mobil" {{ $booking->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>Mobil</option>
                        <option value="motor" {{ $booking->jenis_kendaraan == 'motor' ? 'selected' : '' }}>Motor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Kendaraan</label>
                    <input type="text" name="nama_kendaraan" value="{{ $booking->nama_kendaraan }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" value="{{ $booking->tanggal_sewa }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Lama Sewa (Hari)</label>
                    <input type="number" name="lama_sewa" value="{{ $booking->lama_sewa }}" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label>Status Booking</label>
                    <select name="status" class="form-select">
                        <option value="menunggu" {{ $booking->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="disetujui" {{ $booking->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ $booking->status == 'batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>