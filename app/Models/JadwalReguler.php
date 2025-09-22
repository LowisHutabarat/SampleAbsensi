<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalReguler extends Model
{
    use HasFactory;

    protected $table = 'jadwal_reguler';
    protected $fillable = ['nomor_induk_dosen', 'matkul', 'hari', 'jam_mulai', 'jam_selesai', 'ruang'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'nomor_induk_dosen' , 'nomor_induk');
    }
}
