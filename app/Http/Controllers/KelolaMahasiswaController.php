<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaMahasiswaController extends Controller
{
    /**  daftar pilihan statis prodi & angkatan  */
    private array $daftarProdi   = ['Sistem Informasi', 'Teknik Informatika', 'Pendidikan Teknologi Informasi'];
    private array $daftarAngkatan = [2021, 2022, 2023, 2024, 2025];

    /* ===================== INDEX ===================== */
    public function index(Request $request)
{
    $query = User::with('mahasiswa')
        ->where('role', 'mahasiswa');

    if ($request->filled('prodi')) {
        $query->whereHas('mahasiswa', fn($q) => $q->where('prodi', $request->prodi));
    }

    if ($request->filled('angkatan')) {
        $query->whereHas('mahasiswa', fn($q) => $q->where('angkatan', $request->angkatan));
    }

    $mahasiswas = $query->get();
    $prodis     = ['Sistem Informasi', 'Teknik Informatika', 'Pendidikan Teknologi Informasi'];
    $angkatans  = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025];

    return view('kelola_mahasiswa.index', compact('mahasiswas', 'prodis', 'angkatans'));
}


    /* ===================== CREATE ==================== */
    public function create()
    {
        $prodis    = $this->daftarProdi;
        $angkatans = $this->daftarAngkatan;
        return view('kelola_mahasiswa.create', compact('prodis', 'angkatans'));
    }

    /* ===================== STORE ===================== */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required|unique:users',
            'name'        => 'required',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|confirmed|min:6',
            'prodi'       => 'required',
            'angkatan'    => 'required',
        ]);

        // 1. tabel users
        User::create([
            'nomor_induk' => $request->nomor_induk,
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => 'mahasiswa',
        ]);

        // 2. tabel mahasiswas
        Mahasiswa::create([
            'nomor_induk' => $request->nomor_induk,
            'prodi'       => $request->prodi,
            'angkatan'    => $request->angkatan,
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /* ===================== EDIT ====================== */
    public function edit($nomor_induk)
    {
        $user      = User::where('nomor_induk', $nomor_induk)->firstOrFail();
        $mahasiswa = $user->mahasiswa;                                    // relasi
        $prodis    = $this->daftarProdi;
        $angkatans = $this->daftarAngkatan;

        return view('kelola_mahasiswa.edit', compact(
            'user', 'mahasiswa', 'prodis', 'angkatans'
        ));
    }

    /* ===================== UPDATE ==================== */
    public function update(Request $request, $nomor_induk)
    {
        $user = User::where('nomor_induk', $nomor_induk)->firstOrFail();

        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'prodi'    => 'required',
            'angkatan' => 'required',
        ]);

        // users
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // mahasiswas
        $user->mahasiswa()->update([
            'prodi'    => $request->prodi,
            'angkatan' => $request->angkatan,
        ]);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /* ===================== DESTROY =================== */
    public function destroy($nomor_induk)
    {
        Mahasiswa::where('nomor_induk', $nomor_induk)->delete();
        User::where('nomor_induk', $nomor_induk)->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
