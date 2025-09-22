<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sesi_kuliahs', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_induk_dosen');
    $table->string('kode_mata_kuliah');
    $table->integer('pertemuan');
    $table->enum('status', ['hadir', 'pending'])->default('hadir');
$table->enum('jenis_sesi', ['reguler', 'pengganti'])->default('reguler');
    $table->dateTime('mulai')->nullable();
    $table->dateTime('berakhir')->nullable();
    $table->string('kode_qr')->nullable();
    $table->text('berita_acara')->nullable();
    $table->string('dokumentasi')->nullable();
    $table->timestamps();

    $table->foreign('nomor_induk_dosen')->references('nomor_induk')->on('users')->onDelete('cascade');
    $table->foreign('kode_mata_kuliah')->references('kode')->on('mata_kuliahs')->onDelete('cascade');
});




    }




    public function down(): void
    {
        Schema::dropIfExists('sesi_kuliahs');
    }
};
