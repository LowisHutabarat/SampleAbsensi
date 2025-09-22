<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    protected $fillable = [
        'kode',
        'nama',
        'sks',
    ];


    // Relasi ke dosen pengampu mata kuliah ini
public function dosens()
{
    return $this->belongsToMany(
        User::class,
        'dosen_mata_kuliah',      // nama tabel pivot
        'kode_mata_kuliah',       // foreign key di pivot mengarah ke model ini
        'nomor_induk_dosen',      // foreign key di pivot mengarah ke user
        'kode',                   // local key dari model ini
        'nomor_induk'             // local key dari model User
    );
}


public function sesiKuliahs()
{
    return $this->hasMany(SesiKuliah::class, 'kode_mata_kuliah', 'kode');
}


}
