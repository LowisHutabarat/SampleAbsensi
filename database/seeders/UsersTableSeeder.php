<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Akademik (Kepala Program Studi)
        User::create([
            'name' => 'Kepala Program Studi Sistem Informasi',
            'email' => 'adminSI@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '0101038801',
            'role' => 'admin_akademik',
        ]);

        User::create([
            'name' => 'Pegawai',
            'email' => 'adminTI@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '0101038804',
            'role' => 'admin_akademik',
        ]);

        // Dosen tambahan manual
        User::create([
            'name' => 'Samuel Manurung',
            'email' => 'dosen@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '0107018901',
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'Jimmy Naibaho',
            'email' => 'dosen1@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '0116027701',
            'role' => 'dosen',
        ]);

        // Pegawai
        User::create([
            'name' => 'Pegawai SI',
            'email' => 'pegawai@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '0102038801',
            'role' => 'pegawai',
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Lowis Hutabarat',
            'email' => 'mahasiswa@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '222528001',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Gidion Depari',
            'email' => 'mahasiswa1@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520043',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Vony Simamora',
            'email' => 'mahasiswa2@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520050',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Naomi Gracetira',
            'email' => 'mahasiswa3@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520035',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Maria Gultom',
            'email' => 'mahasiswa4@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520005',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Dina Lumbantoruan',
            'email' => 'mahasiswa5@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520042',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Hernandez Butar-Butar',
            'email' => 'mahasiswa6@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520055',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Yogi Gabriel',
            'email' => 'mahasiswa7@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520039',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Theresia Simbolon',
            'email' => 'mahasiswa8@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520053',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Gracetia Sihite',
            'email' => 'mahasiswa9@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520006',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Febi Sinurat',
            'email' => 'mahasiswa10@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520036',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Joy Lingga',
            'email' => 'mahasiswa11@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520044',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Julius Manurung',
            'email' => 'mahasiswa12@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520052',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Josua Pedro',
            'email' => 'mahasiswa13@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520074',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Abraham Silalahi',
            'email' => 'mahasiswa14@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520038',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Diana Sigalingging',
            'email' => 'mahasiswa15@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520047',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Harvyeri Nadeak',
            'email' => 'mahasiswa16@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520078',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Kevin Ginting',
            'email' => 'mahasiswa17@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520059',
            'role' => 'mahasiswa',
        ]);

                User::create([
            'name' => 'Fransius Tambunan',
            'email' => 'mahasiswa18@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520041',
            'role' => 'mahasiswa',
        ]);

                        User::create([
            'name' => 'Egita Lumbantoruan',
            'email' => 'mahasiswa19@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520048',
            'role' => 'mahasiswa',
        ]);

                        User::create([
            'name' => 'Nokia Margareta',
            'email' => 'mahasiswa20@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520058',
            'role' => 'mahasiswa',
        ]);

                        User::create([
            'name' => 'Daniel Pranata',
            'email' => 'mahasiswa21@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520079',
            'role' => 'mahasiswa',
        ]);

                                User::create([
            'name' => 'Gabriel Napitupulu',
            'email' => 'mahasiswa22@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520054',
            'role' => 'mahasiswa',
        ]);

                                User::create([
            'name' => 'Angga Manurung',
            'email' => 'mahasiswa23@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520060',
            'role' => 'mahasiswa',
        ]);

                                User::create([
            'name' => 'Piter Telambanua',
            'email' => 'mahasiswa24@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221520040',
            'role' => 'mahasiswa',
        ]);

        $emailCounter = 25;


        // Data mahasiswa yang diekstrak dan diatur dalam format User::create()
        // Email akan secara otomatis berlanjut dari nomor terakhir ($emailCounter)

        User::create([
            'name' => 'Fajar Gunawan Silaban',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510002',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Charis Christo Pinem',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510008',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Aser Boyma Sinaga',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510022',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Soloma Whendy Lumban Gaol',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510041',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Andre Hugo Fransiskus Tarigan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510055',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Efry Sastika Sihombing',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510002',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Rosalinda Gadiseli Sihombing',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510007',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Putri Maria Cornelia Purba',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510008',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Sepaltia Noderia Sitorus',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510016',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Priado Siregar',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510021',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Doly Boan Tua Gurning',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510035',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Lelinta Br Perangin-angin',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510039',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Dody Pramansyah Sianipar',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510057',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Putri S Pane',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510063',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Gilbert Parlinggoman Pangaribuan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510070',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Widia Margaretha Sidabutar',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510077',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Osin Br Manurung',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510079',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Nadyarni Natalis Caesarin Duha',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510091',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Oky Alexander Sihotang',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510095',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Novita Christin Roulina Nainggolan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510099',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Silvia Malona Nainggolan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510100',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Krisna Diva',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510108',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Rani Martupa Sihombing',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510137',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Hans Yoseph Syah Putra',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510145',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Theresia Melasari Sihaloho',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '222518009',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Yedo Mileno Roderardo Simanjuntak',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '219510063',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Binsar Hermanto Hutapea',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '219510072',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Rein Hotlayn Johanes Silitonga',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '219510152',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Maria Elisabet Sinaga',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510023',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Thomy Franklin Panjaitan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510025',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Togu Parulian Simbolon',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510032',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Maranata Simanjuntak',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510057',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Andre Wilson Purba',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220510063',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Handrianta Ginting',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220515106',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Ratmos M Tampubolon',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '220519114',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Exra Manurung',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510014',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Andrew Efraim Nicholas Sitompul',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510029',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Putri Anjelin Nainggolan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510045',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Cristina Adelia Putri Silaban',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510049',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Gresko Silalahi',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510054',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Sondang Sitompul',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510060',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Nazareth Yngwie M Situmeang',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510065',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Jefry Daniel Tarigan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510068',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Christian Panggabean',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510071',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Melchiman Pangaribuan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510076',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Agnes Sabrina Sinaga',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510086',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Wulan Nastasya Siallagan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510088',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Reynaldi Arbenoni Singarimbun',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510093',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Diana Gabriela',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510096',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Iren Priscilla Bu\'ulolo',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510098',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Fanri Jeremi Sianipar',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510102',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Petrus Halawa',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510115',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Suchitra Dewi',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510116',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Grasia Hutabarat',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510132',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Elisabeth Lumbantobing',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510139',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Indriani Rumapea',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510144',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Kevin Maharta Lumban Batu',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510147',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Doni Nainggolan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510081',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Kelvin Tamado Sitorus',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510095',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Jefferson Siregar',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510059',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Putra S Sigalingging',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510138',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Gian Pernando Purba',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '219510089',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Jendri M HD Silitonga',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510034',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Jeremi Sitinjak',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510037',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Mika Elisa Br Ginting',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510055',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Rahul Josua Situmorang',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510067',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Hendarta Malau',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '221510092',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Yeriel John Fourdes Simangungsong',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510022',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Lin Obled Nainggolan',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510050',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Katrin Angelia Manalu',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510044',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Crissanti Purba',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510098',
            'role' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Geo Felix Manik',
            'email' => 'mahasiswa' . $emailCounter++ . '@kampus.ac.id',
            'password' => Hash::make('password'),
            'nomor_induk' => '218510139',
            'role' => 'mahasiswa',
        ]);

        // Dosen Tetap dari Gambar
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

        foreach ($dosenList as $dosen) {
            $nameFull = $dosen[0];
            $nomorInduk = $dosen[1];

            // Hapus gelar di depan dan belakang
            $nameClean = preg_replace('/^(Drs?\.|Dr\.|Ir\.|Prof\.|[A-Z]\.|\bS\.T\.|\bS\.Kom\.|\bM\.Kom\.|\bM\.Pd\.|\bM\.Hum\.|\bS\.Pd\.|\bM\.Psi\.|\bM\.Si\.|\bS\.IP\.,?|\bMT\.,?|\bM\.TM\.,?)\s*/', '', $nameFull);
            $nameClean = preg_replace('/,\s?.*/', '', $nameClean);

            $parts = explode(' ', $nameClean);
            $first = strtolower($parts[0] ?? 'user');
            $last = strtolower($parts[1] ?? 'nama');

            $email = "{$first}.{$last}@dosen.kampus.ac.id";

            User::create([
                'name' => $nameFull,
                'email' => $email,
                'password' => Hash::make('password'),
                'nomor_induk' => $nomorInduk,
                'role' => 'dosen',
            ]);
        }
    }
}
