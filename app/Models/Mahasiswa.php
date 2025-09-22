<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
    'nomor_induk', 'prodi', 'angkatan',
];

    public function user()
{
    return $this->belongsTo(User::class, 'nomor_induk', 'nomor_induk');
}

}
