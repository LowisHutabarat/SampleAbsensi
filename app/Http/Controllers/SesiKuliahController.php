<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SesiKuliah;
use App\Models\MataKuliah;
use App\Models\Absensi;
use App\Models\PenggantiSesi;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class SesiKuliahController extends Controller
{
    public function create()
    {
        $mataKuliahs = auth()->user()->mataKuliahs;
        return view('sesi.create', compact('mataKuliahs'));
    }

    public function show($id)
{
    $sesi = SesiKuliah::with('mataKuliah')->findOrFail($id);
    return view('sesi.show', compact('sesi'));
}

public function store(Request $request)
{
    $request->validate([
        'kode_mata_kuliah' => 'required|exists:mata_kuliahs,kode',
    ]);

    $nomorInduk = auth()->user()->nomor_induk;
    $kodeMatkul = $request->kode_mata_kuliah;

    // Cek apakah ada sesi pengganti yg disetujui dan belum dibuka
    $sesiPengganti = SesiKuliah::where('nomor_induk_dosen', $nomorInduk)
        ->where('kode_mata_kuliah', $kodeMatkul)
        ->where('status', 'pending')
        ->where('jenis_sesi', 'pengganti')
        ->first();

    if ($sesiPengganti) {
        $sesiPengganti->update([
            'mulai' => now(),
            'berakhir' => now()->addMinutes(30),
            'kode_qr' => Str::uuid(),
            'status' => 'hadir',
        ]);

        return redirect()->route('sesi.show', $sesiPengganti->id)
            ->with('success', 'Sesi pengganti berhasil dibuka.');
    }

    // Jika tidak ada pengganti, lanjut sesi reguler
    $lastPertemuan = SesiKuliah::where('nomor_induk_dosen', $nomorInduk)
        ->where('kode_mata_kuliah', $kodeMatkul)
        ->max('pertemuan') ?? 0;

    $sesiReguler = SesiKuliah::create([
        'nomor_induk_dosen' => $nomorInduk,
        'kode_mata_kuliah' => $kodeMatkul,
        'pertemuan' => $lastPertemuan + 1,
        'mulai' => now(),
        'berakhir' => now()->addMinutes(30),
        'kode_qr' => Str::uuid(),
        'status' => 'hadir',
        'jenis_sesi' => 'reguler',
    ]);

    return redirect()->route('sesi.show', $sesiReguler->id)
        ->with('success', 'Sesi reguler berhasil dibuka.');
}

public function skipStore(Request $request)
{
    $request->validate([
        'kode_mata_kuliah' => 'required|exists:mata_kuliahs,kode',
    ]);

    $nomorInduk = auth()->user()->nomor_induk;
    $kodeMatkul = $request->kode_mata_kuliah;
    $pertemuan = SesiKuliah::where('nomor_induk_dosen', $nomorInduk)
        ->where('kode_mata_kuliah', $kodeMatkul)
        ->count() + 1;

    $sesi = SesiKuliah::create([
        'nomor_induk_dosen' => $nomorInduk,
        'kode_mata_kuliah' => $kodeMatkul,
        'pertemuan' => $pertemuan,
        'status' => 'pending',
        'jenis_sesi' => 'reguler',
        'kode_qr' => '-', // placeholder
    ]);

    return redirect()->route('pengganti.create', ['sesi_awal_id' => $sesi->id, 'kode_mata_kuliah' => $kodeMatkul]);
}



public function closeForm($id)
{
    $sesi = SesiKuliah::findOrFail($id);
    return view('sesi.close', compact('sesi'));
}

// FINAL - potongan method close() yang aman
public function close(Request $request, $id)
{
    $request->validate([
        'berita_acara' => 'required',
        'dokumentasi'  => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $sesi = SesiKuliah::findOrFail($id);

    //  simpan ke storage/app/public/dokumentasi
    $path = $request->file('dokumentasi')
                   ->store('dokumentasi', 'public');

    $sesi->update([
        'berita_acara' => $request->berita_acara,
        'dokumentasi'  => $path,      // hanya "dokumentasi/namafile.jpg"
        'berakhir'     => now(),
    ]);

    return redirect()->route('dashboard')
           ->with('success', 'Sesi ditutup.');
}



public function skip(Request $request)
{
    $request->validate([
        'kode_mata_kuliah' => 'required|exists:mata_kuliahs,kode',
    ]);

    $nomorInduk = auth()->user()->nomor_induk;
    $kodeMatkul = $request->kode_mata_kuliah;

    $pertemuan = SesiKuliah::where('nomor_induk_dosen', $nomorInduk)
        ->where('kode_mata_kuliah', $kodeMatkul)
        ->count() + 1;

    $sesi = SesiKuliah::create([
        'nomor_induk_dosen' => $nomorInduk,
        'kode_mata_kuliah' => $kodeMatkul,
        'pertemuan' => $pertemuan,
        'status' => 'pending',
        'jenis_sesi' => 'pengganti', // <-- inilah kuncinya
        'kode_qr' => '-', // placeholder
    ]);

    return redirect()->route('pengganti.create', ['sesi_awal_id' => $sesi->id]);
}


}
