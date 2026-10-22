<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Booking Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Booking Sewa Kendaraan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nomor HP / WhatsApp</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" class="form-select" required>
                        <option value="mobil">Mobil</option>
                        <option value="motor">Motor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Kendaraan / Tipe Unit</label>
                    <input type="text" name="nama_kendaraan" placeholder="Contoh: Avanza / NMAX" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Sewa</label>
                    <input type="date" name="tanggal_sewa" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Lama Sewa (Hari)</label>
                    <input type="number" name="lama_sewa" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label>Catatan Opsional</label>
                    <textarea name="catatan" class="form-control" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Booking</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>