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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            // Gunakan nomor_induk sebagai foreign key (bukan user_id)
            $table->string('nomor_induk');
            $table->unsignedBigInteger('sesi_kuliah_id');
            $table->timestamp('waktu_absen');
            $table->timestamps();

            // Foreign key ke users.nomor_induk
            $table->foreign('nomor_induk')
                  ->references('nomor_induk')
                  ->on('users')
                  ->onDelete('cascade');

            // Foreign key ke sesi_kuliahs.id
            $table->foreign('sesi_kuliah_id')
                  ->references('id')
                  ->on('sesi_kuliahs')
                  ->onDelete('cascade');

            // Cegah double absen
            $table->unique(['nomor_induk', 'sesi_kuliah_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
