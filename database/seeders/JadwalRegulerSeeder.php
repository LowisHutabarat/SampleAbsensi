<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalReguler;

class JadwalRegulerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nomor_induk_dosen' => '0101038801',
                'matkul' => 'Pemrograman Web',
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'ruang' => 'LAB 1',
            ],
            [
                'nomor_induk_dosen' => '0101038802',
                'matkul' => 'Basis Data',
                'hari' => 'Selasa',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'ruang' => '304',
            ],
            [
                'nomor_induk_dosen' => '0107018901',
                'matkul' => 'Jaringan Komputer',
                'hari' => 'Selasa',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'ruang' => '205',
            ],
            [
                'nomor_induk_dosen' => '0107018901',
                'matkul' => 'Pemrograman Visual',
                'hari' => 'Rabu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                'ruang' => '104',
            ],
        ];

        foreach ($data as $item) {
            JadwalReguler::create($item);
        }
    }
}

