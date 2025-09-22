<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        // Data awal tetap
        MataKuliah::insert([
            [
                'kode' => 'SIK001',
                'nama' => 'Pemrograman Web',
                'sks' => 3,
            ],
            [
                'kode' => 'TIK002',
                'nama' => 'Basis Data',
                'sks' => 3,
            ],
            [
                'kode' => 'TIK003',
                'nama' => 'Jaringan Komputer',
                'sks' => 2,
            ],
            [
                'kode' => 'SIK004',
                'nama' => 'Pemrograman Visual',
                'sks' => 2,
            ],
['kode' => 'SIK005', 'nama' => 'Matematika Diskrit', 'sks' => 3],
            ['kode' => 'SIK006', 'nama' => 'Analisis Sistem Informasi', 'sks' => 3],
            ['kode' => 'SIK007', 'nama' => 'Sistem Basis Data', 'sks' => 3],
            ['kode' => 'SIK008', 'nama' => 'Etika Profesi TI', 'sks' => 2],
            ['kode' => 'TIK006', 'nama' => 'Kecerdasan Buatan', 'sks' => 3],
            ['kode' => 'TIK007', 'nama' => 'Sistem Operasi', 'sks' => 3],
            ['kode' => 'TIK008', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
            ['kode' => 'TIK009', 'nama' => 'Struktur Data', 'sks' => 3],
        ]);

        // Tambahan mata kuliah baru

    }
}
