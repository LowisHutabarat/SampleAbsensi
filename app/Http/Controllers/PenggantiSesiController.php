<?php

namespace App\Http\Controllers;

use App\Models\PenggantiSesi;
use App\Models\SesiKuliah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PenggantiSesiController extends Controller
{
    public function index()
    {
        $pengganti = PenggantiSesi::where('nomor_induk_dosen', auth()->user()->nomor_induk)->get();
        return view('pengganti.index', compact('pengganti'));
    }

    public function create(Request $request)
    {
        $kodeDipilih = $request->query('kode_mata_kuliah');
        $user = auth()->user();

        $kodeMataKuliah = $user->mataKuliahs()->pluck('nama', 'kode');
        $nomorInduk = $user->nomor_induk;

        $sesiAwal = SesiKuliah::where('nomor_induk_dosen', $nomorInduk)
            ->where('kode_mata_kuliah', $kodeDipilih)
            ->where('status', 'pending')
            ->orderBy('pertemuan')
            ->first();

        $sesiAwalId = $sesiAwal?->id;

        return view('pengganti.create', compact('kodeMataKuliah', 'kodeDipilih', 'sesiAwalId'));
    }

public function store(Request $request)
{
    $request->validate([
        'sesi_awal_id' => 'required|exists:sesi_kuliahs,id',
        'kode_mata_kuliah' => 'required',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'ruang' => 'required|string',
    ]);

    PenggantiSesi::create([
        'sesi_awal_id' => $request->sesi_awal_id,
        'nomor_induk_dosen' => auth()->user()->nomor_induk,
        'kode_mata_kuliah' => $request->kode_mata_kuliah,
        'tanggal_pengganti' => $request->tanggal,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'ruang' => $request->ruang,
        'status' => 'pending',
    ]);

    return redirect()->route('pengganti.index')->with('success', 'Pengajuan berhasil. Menunggu persetujuan admin.');
}




public function approve($id)
{
    $pengganti = PenggantiSesi::findOrFail($id);
    $sesi = $pengganti->sesiAwal;

    if (!$sesi) {
        return back()->with('error', 'Sesi awal tidak ditemukan.');
    }

    // Jangan langsung mengisi waktu atau mengubah ke hadir!
    $sesi->update([
        'status' => 'pending',
        'jenis_sesi' => 'pengganti', // pastikan jenisnya jadi pengganti
    ]);

    $pengganti->update(['status' => 'disetujui']);

    return back()->with('success', 'Pengganti disetujui. Dosen dapat membuka sesi pengganti.');
}



    public function reject($id)
    {
        $pengganti = PenggantiSesi::findOrFail($id);
        $pengganti->update([
            'status' => 'ditolak',
        ]);

        return redirect()->back()->with('error', 'Pengajuan ditolak.');
    }

public function adminIndex(Request $request)
{
    $query = PenggantiSesi::with(['dosen', 'mataKuliah', 'sesiAwal']);

    if ($request->filled('nidn')) {
        $query->where('nomor_induk_dosen', $request->nidn);
    }

    $pengajuan = $query->latest()->get();
    $sesi = SesiKuliah::with(['mataKuliah', 'dosen'])->latest()->get();
    $daftarDosen = User::where('role', 'dosen')->get();

    return view('pengganti.admin.index', compact('pengajuan', 'sesi', 'daftarDosen'));
}

}
