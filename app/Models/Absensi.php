<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'nomor_induk', 'sesi_kuliah_id', 'waktu_absen'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'nomor_induk', 'nomor_induk');
    }

    public function sesiKuliah()
    {
        return $this->belongsTo(SesiKuliah::class);
    }


}
