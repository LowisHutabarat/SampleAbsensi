<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterReguler extends Model
{
    use HasFactory;

    protected $table = 'roster_regulers';

    protected $fillable = [
    'prodi',
    'semester',
    'kode_mata_kuliah',
    'nama_mata_kuliah',
    'sks', // tambahkan ini
    'nomor_induk_dosen',
    'nama_dosen',
    'hari',
    'jam_mulai',
    'jam_selesai',
    'ruang',
];

}
