<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MataKuliah;
use App\Models\User;

class DosenMataKuliahSeeder extends Seeder
{
    public function run(): void
    {
$data = [
    ['nomor_induk_dosen' => '0116086201', 'kode_mata_kuliahs' => ['SIK001']], // Dr. Humuntal Rumapea, M.Kom - Pemrograman Web
    ['nomor_induk_dosen' => '0010047606', 'kode_mata_kuliahs' => ['TIK002']], // Dr. Darwis R. Manalu - Basis Data
    ['nomor_induk_dosen' => '0123077601', 'kode_mata_kuliahs' => ['TIK003']], // Indra M Sarkis - Jaringan Komputer
    ['nomor_induk_dosen' => '0102079101', 'kode_mata_kuliahs' => ['SIK004']], // Yolanda Y. P. Rumapea - Pemrograman Visual
    ['nomor_induk_dosen' => '0122017802', 'kode_mata_kuliahs' => ['SIK005']], // Asaziduhu Gea - Matematika Diskrit
    ['nomor_induk_dosen' => '0111066403', 'kode_mata_kuliahs' => ['SIK006']], // Dr. Jhoni M. Hutapea - Analisis SI
    ['nomor_induk_dosen' => '0131127102', 'kode_mata_kuliahs' => ['SIK007']], // Fati G. N. Larosa - Sistem Basis Data
    ['nomor_induk_dosen' => '0129118301', 'kode_mata_kuliahs' => ['SIK008']], // Edward Rajagukguk - Etika Profesi TI
    ['nomor_induk_dosen' => '0105087301', 'kode_mata_kuliahs' => ['TIK006']], // Doli Hasibuan - Kecerdasan Buatan
    ['nomor_induk_dosen' => '0126086901', 'kode_mata_kuliahs' => ['TIK007']], // Nettina Samosir - Sistem Operasi
    ['nomor_induk_dosen' => '0417087802', 'kode_mata_kuliahs' => ['TIK008']], // Dr. Sri Agustina Rumapea - RPL
    ['nomor_induk_dosen' => '0125089301', 'kode_mata_kuliahs' => ['TIK009']], // Arina Prima Silalahi - Struktur Data
];


foreach ($data as $item) {
    $dosen = User::where('nomor_induk', $item['nomor_induk_dosen'])->first();

    if ($dosen) {
        foreach ($item['kode_mata_kuliahs'] as $kode) {
            $mataKuliah = MataKuliah::where('kode', $kode)->first();

            if ($mataKuliah) {
                DB::table('dosen_mata_kuliah')->insert([
                    'nomor_induk_dosen' => $dosen->nomor_induk,
                    'kode_mata_kuliah' => $mataKuliah->kode,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                echo "✔️ Dosen '{$dosen->name}' ditugaskan mengampu mata kuliah '{$mataKuliah->nama}'\n";
            } else {
                echo "❌ Mata Kuliah '$kode' tidak ditemukan.\n";
            }
        }
    } else {
        echo "❌ Dosen '{$item['nomor_induk_dosen']}' tidak ditemukan.\n";
    }
}

    }
}
