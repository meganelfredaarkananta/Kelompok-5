<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemesan');
        $table->string('no_hp');
        $table->enum('jenis_kendaraan', ['mobil', 'motor']);
        $table->string('nama_kendaraan'); // Contoh: Avanza, NMAX, Vario
        $table->date('tanggal_sewa');
        $table->integer('lama_sewa'); // Hitungan hari
        $table->text('catatan')->nullable();
        $table->string('status')->default('menunggu');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
