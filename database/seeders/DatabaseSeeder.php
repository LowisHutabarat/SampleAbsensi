<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call([
    UsersTableSeeder::class,
    JadwalRegulerSeeder::class,
    ]);

    $this->call([
    DosenMataKuliahSeeder::class,
]);

$this->call([
        MataKuliahSeeder::class,
        DosenSeeder::class,
        DosenMataKuliahSeeder::class,
    ]);

    $this->call(RosterRegulerSeeder::class);

    $this->call(MahasiswaSeeder::class);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
