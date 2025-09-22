<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenggantiSesi extends Model
{
    protected $fillable = [
        'sesi_awal_id',
        'nomor_induk_dosen',
        'kode_mata_kuliah',
        'tanggal_pengganti',
        'jam_mulai',
        'jam_selesai',
        'ruang',
        'status'
    ];


    public function mataKuliah()
    {
        return $this->belongsTo(\App\Models\MataKuliah::class, 'kode_mata_kuliah', 'kode');
    }

    public function sesiAwal()
    {
        return $this->belongsTo(SesiKuliah::class, 'sesi_awal_id');
    }

        public function dosen()
    {
        return $this->belongsTo(User::class, 'nomor_induk_dosen', 'nomor_induk');

    }
}
