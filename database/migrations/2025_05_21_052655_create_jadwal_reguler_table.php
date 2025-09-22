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
        Schema::create('jadwal_reguler', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_induk_dosen');
    $table->string('matkul'); // Nama Mata Kuliah
    $table->string('hari');
    $table->time('jam_mulai');
    $table->time('jam_selesai');
    $table->string('ruang');
    $table->timestamps();

     $table->foreign('nomor_induk_dosen')->references('nomor_induk')->on('users')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_reguler');
    }
};
