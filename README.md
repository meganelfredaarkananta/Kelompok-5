# Deskripsi Sistem

Disini kami Kelompok 5 membuat Sistem Booking Jasa Sewa Mobil & Motor,Sistem Booking Jasa Sewa Mobil & Motor adalah aplikasi berbasis web yang dibangun menggunakan *framework* **Laravel** untuk mengelola transaksi pemesanan rental kendaraan secara terstruktur dan efisien.


## Fitur Utama

Aplikasi ini menyediakan fungsionalidad pengelolaan data pemesanan secara penuh (**CRUD - Create, Read, Update, Delete**):

* Daftar Pemesanan (Read): Menampilkan seluruh data transaksi booking dalam bentuk tabel yang teratur beserta indikator status pemesanan.
* Formulir Tambah Booking (Create): Mengakomodasi pendaftaran sewa baru dengan validasi data input (nama, nomor HP, jenis kendaraan, nama kendaraan, tanggal, durasi sewa, dan catatan).
* Edit Data & Status (Update): Memperbarui rincian pemesanan dan mengubah status transaksi (`menunggu`, `disetujui`, `selesai`, atau `batal`).
* Hapus Pemesanan (Delete): Menghapus rekaman transaksi yang dibatalkan atau tidak valid dari database.


## Spesifikasi Teknologi

| Komponen | Teknologi / Alat |
| :--- | :--- |
| **Framework Backend** | Laravel |
| **Bahasa Pemrograman** | PHP |
| **Database Engine** | MySQL |
| **User Interface** | HTML5, CSS3, Bootstrap |
| **Server Lokal** | Laragon |
| **Database Tooling** | HeidiSQL & VS Code Database Client |
| **Version Control** | Git & GitHub |

---

## Skema Database

Aplikasi menggunakan tabel utama **`bookings`** dengan struktur kolom sebagai berikut:

| Nama Kolom | Tipe Data | Atribut | Keterangan |
| :--- | :--- | :--- | :--- |
| `id` | BigInt | Primary Key, Auto Increment | Identifikasi unik transaksi |
| `nama_pemesan` | Varchar(255) | Not Null | Nama lengkap pelanggan |
| `no_hp` | Varchar(50) | Not Null | Nomor kontak/WhatsApp |
| `jenis_kendaraan` | Enum | 'mobil', 'motor' | Kategori kendaraan |
| `nama_kendaraan` | Varchar(255) | Not Null | Merk/tipe kendaraan |
| `tanggal_sewa` | Date | Not Null | Tanggal mulai sewa |
| `lama_sewa` | Integer | Not Null | Durasi sewa (hari) |
| `catatan` | Text | Nullable | Permintaan/catatan khusus |
| `status` | Enum | Default 'menunggu' | Status (`menunggu`, `disetujui`, `selesai`, `batal`) |


## Struktur Kode Berkas Utama

* **`routes/web.php`**: Mengatur alur rute aplikasi dan mengarahkan halaman utama langsung ke antarmuka pemesanan.
* **`app/Http/Controllers/BookingController.php`**: Mengendalikan logika bisnis, validasi form, serta pemrosesan data CRUD.
* **`app/Models/Booking.php`**: Model Eloquent yang menghubungkan logika aplikasi dengan tabel `bookings`.
* **`resources/views/bookings/`**: Komponen tampilan antarmuka berbasis Blade:
  * `index.blade.php`: Halaman utama tabel data booking.
  * `create.blade.php`: Form penambahan booking baru.
  * `edit.blade.php`: Form pembaruan data dan status booking.


## Panduan Pengoperasian (Petunjuk Kolaborasi)

Bagi anggota tim yang ingin menjalankan proyek ini di lingkungan lokal:

1. **Klon Repository:**
   ```bash
   git clone [https://github.com/meganelfredaarkananta/Kelompok-5.git](https://github.com/meganelfredaarkananta/Kelompok-5.git)
   cd sistem-booking

