<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roster_regulers', function (Blueprint $table) {
            $table->id();
            $table->string('prodi');
            $table->unsignedTinyInteger('semester');
            $table->string('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->unsignedTinyInteger('sks'); // ✅ kolom baru untuk SKS
            $table->string('nomor_induk_dosen');
            $table->string('nama_dosen');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roster_regulers');
    }
};
