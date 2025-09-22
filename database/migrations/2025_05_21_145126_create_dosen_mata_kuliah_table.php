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
       Schema::create('dosen_mata_kuliah', function (Blueprint $table) {
    $table->string('nomor_induk_dosen');     // FK ke users.nomor_induk
    $table->string('kode_mata_kuliah');      // FK ke mata_kuliahs.kode
  $table->timestamps();
    $table->foreign('nomor_induk_dosen')
          ->references('nomor_induk')->on('users')->onDelete('cascade');

    $table->foreign('kode_mata_kuliah')
          ->references('kode')->on('mata_kuliahs')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_mata_kuliah');
    }
};
