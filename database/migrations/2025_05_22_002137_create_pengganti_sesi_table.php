<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengganti_sesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sesi_awal_id');
            $table->string('nomor_induk_dosen');
            $table->string('kode_mata_kuliah');
            $table->date('tanggal_pengganti');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruang');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();

            $table->foreign('sesi_awal_id')->references('id')->on('sesi_kuliahs')->onDelete('cascade');
            $table->foreign('nomor_induk_dosen')->references('nomor_induk')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengganti_sesis');
    }
};
