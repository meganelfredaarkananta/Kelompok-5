<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'no_hp',
        'jenis_kendaraan',
        'nama_kendaraan',
        'tanggal_sewa',
        'lama_sewa',
        'catatan',
        'status',
    ];
}
