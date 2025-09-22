<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use App\Models\SesiKuliah;

class SesiKuliah extends Model
{
    protected $fillable = [
        'nomor_induk_dosen',
        'kode_mata_kuliah',
        'pertemuan',
        'status',
        'mulai',
        'berakhir',
        'kode_qr',
        'berita_acara',
        'dokumentasi'
    ];



public function index()
{
    $pengajuan = Pengganti::with(['dosen', 'mataKuliah'])->get();
    $sesi = SesiKuliah::with(['mataKuliah', 'dosen'])->get();

    return view('pengganti.index', compact('pengajuan', 'sesi'));
}


    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mata_kuliah', 'kode');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'nomor_induk_dosen', 'nomor_induk');
    }

public function absensi()
{
    return $this->hasMany(Absensi::class, 'sesi_kuliah_id');
}

}
