<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_induk',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ✅ Sesi Kuliah yang dilakukan oleh user
    public function sesiKuliahs(): HasMany
    {
        return $this->hasMany(SesiKuliah::class, 'nomor_induk_dosen', 'nomor_induk');
    }

    // ✅ Absensi yang dilakukan oleh user (mahasiswa)
    public function absensis(): HasMany
    {
        return $this->hasMany(Absensi::class, 'nomor_induk', 'nomor_induk');
    }

    // ✅ Jadwal reguler berdasarkan nomor induk dosen
public function jadwalDosen()
{
    return $this->hasMany(\App\Models\RosterReguler::class, 'nomor_induk_dosen', 'nomor_induk');
}


public function mataKuliahs()
{
    return $this->belongsToMany(
        MataKuliah::class,
        'dosen_mata_kuliah',         // pivot table
        'nomor_induk_dosen',         // foreign key di pivot mengacu ke User
        'kode_mata_kuliah',          // foreign key di pivot mengacu ke MataKuliah
        'nomor_induk',               // local key di users
        'kode'                       // local key di mata_kuliahs
    );
}

public function penggantiSesi()
{
    return $this->hasMany(PenggantiSesi::class, 'nomor_induk_dosen', 'nomor_induk');
}


public function mahasiswa()
{
    return $this->hasOne(Mahasiswa::class, 'nomor_induk', 'nomor_induk');
}


}
