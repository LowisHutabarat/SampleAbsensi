<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RosterReguler;
use App\Models\MataKuliah;
use App\Models\User;

class RosterRegulerSeeder extends Seeder
{
    public function run(): void
    {
        $dosenList = [
            ['Dr. Humuntal Rumapea, M.Kom', '0116086201'],
            ['Dr. Darwis R. Manalu, S.Kom., M.M., M.Kom', '0010047606'],
            ['Indra M Sarkis S., ST., M.Kom', '0123077601'],
            ['Yolanda Y. P. Rumapea, S.Kom., M.Kom', '0102079101'],
            ['Asaziduhu Gea, S.Kom., M. Kom', '0122017802'],
            ['Dr. Jhoni Maslan Hutapea, SE., M.TM', '0111066403'],
            ['Fati Gratianus Nairil Larosa. S.Kom., M.Kom', '0131127102'],
            ['Edward Rajagukguk, S.Kom., M.Kom', '0129118301'],
            ['Doli Hasibuan, SE., M. Kom', '0105087301'],
            ['Nettina Samosir S.Th., M.Psi', '0126086901'],
            ['Dr. Sri Agustina Rumapea, S.Kom., M.T', '0417087802'],
            ['Arina Prima Silalahi, S.Kom., M.Kom', '0125089301'],
            ['Naikson F. Saragih ST., M.Kom', '0125057201'],
            ['Indra Kelana Jaya, S.T., M.Kom', '0101018008'],
            ['Ir. Surianto Sitepu, MT', '0128076901'],
            ['Margaretha Yohanna, S.Kom., M. Kom', '0101038802'],
            ['Mufria J Purba, S.Kom., M.Kom', '0120118401'],
            ['Imelda Sri Dumayanti S.Si., M.Kom', '0119027301'],
            ['Alfonsus Situmorang S.Si., M.Kom', '0107057401'],
            ['Harlen Gilbert Simanullang, S.Kom., M. Kom', '0126079101'],
            ['Tamado Simon Sagala, S.IP., M. Pd', '0105059104'],
            ['Mendarsian Aritonang, S.Kom., M.Pd', '0131087301'],
            ['Drs. Posma Lumbanraja, M.Si', '0101116402'],
            ['Veraci Silalahi, S.S., M.Hum', '0130117604'],
            ['Yusuf Ijonris, S.Kom., M.Pd', '0106069601'],
            ['Erika Nora Simamora, S.Pd., M.Pd', '0113118401'],
        ];

        $jadwalTemplate = [
            ['hari' => 'Senin', 'jam_mulai' => '08:00', 'jam_selesai' => '09:40', 'ruang' => 'Lab 1', 'semester' => 2, 'prodi' => 'Sistem Informasi'],
            ['hari' => 'Selasa', 'jam_mulai' => '10:00', 'jam_selesai' => '11:40', 'ruang' => 'Lab 2', 'semester' => 3, 'prodi' => 'Teknik Informatika'],
            ['hari' => 'Rabu', 'jam_mulai' => '13:00', 'jam_selesai' => '14:40', 'ruang' => '203', 'semester' => 4, 'prodi' => 'Pendidikan Teknologi Informasi'],
            ['hari' => 'Kamis', 'jam_mulai' => '15:00', 'jam_selesai' => '16:40', 'ruang' => 'Lab 3', 'semester' => 5, 'prodi' => 'Sistem Informasi'],
            ['hari' => 'Jumat', 'jam_mulai' => '08:00', 'jam_selesai' => '09:40', 'ruang' => 'Lab 4', 'semester' => 6, 'prodi' => 'Teknik Informatika'],
        ];

        $mataKuliahs = MataKuliah::all();
        $dosenCount = count($dosenList);
        $jadwalCount = count($jadwalTemplate);
        $i = 0;

        foreach ($mataKuliahs as $index => $mataKuliah) {
            $dosenData = $dosenList[$index % $dosenCount];
            $jadwal = $jadwalTemplate[$index % $jadwalCount];

            $dosen = User::firstOrCreate(
                ['nomor_induk' => $dosenData[1]],
                [
                    'name' => $dosenData[0],
                    'email' => strtolower(str_replace([' ', ',', '.'], '', $dosenData[0])) . '@example.com',
                    'role' => 'dosen',
                    'password' => bcrypt('password'),
                ]
            );

            RosterReguler::create([
                'prodi' => $jadwal['prodi'],
                'semester' => $jadwal['semester'],
                'kode_mata_kuliah' => $mataKuliah->kode,
                'nama_mata_kuliah' => $mataKuliah->nama,
                'sks' => $mataKuliah->sks,
                'nomor_induk_dosen' => $dosen->nomor_induk,
                'nama_dosen' => $dosen->name,
                'hari' => $jadwal['hari'],
                'jam_mulai' => $jadwal['jam_mulai'],
                'jam_selesai' => $jadwal['jam_selesai'],
                'ruang' => $jadwal['ruang'],
            ]);
        }
    }
}
