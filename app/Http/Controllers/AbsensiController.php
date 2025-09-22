<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Absensi;
use App\Models\SesiKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function scan($kode)
    {
        $sesi = SesiKuliah::where('kode_qr', $kode)
            ->where('berakhir', '>', now())
            ->firstOrFail();

        $sudahAbsen = Absensi::where('sesi_kuliah_id', $sesi->id)
            ->where('nomor_induk', Auth::user()->nomor_induk)
            ->exists();

        if ($sudahAbsen) {
            return back()->with('info', 'Anda sudah absen.');
        }

        Absensi::create([
            'sesi_kuliah_id' => $sesi->id,
            'nomor_induk' => Auth::user()->nomor_induk,
            'waktu_absen' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Absensi berhasil!');
    }

    public function laporanPDF($mata_kuliah_id)
{
    $dosen_id = Auth::user()->id;

    $mataKuliah = MataKuliah::where('id', $mata_kuliah_id)
        ->where('dosen_id', $dosen_id) // hanya dosen terkait
        ->firstOrFail();

    $absensi = Absensi::whereHas('sesiKuliah', function ($query) use ($mata_kuliah_id) {
        $query->where('mata_kuliah_id', $mata_kuliah_id);
    })->get();

    $pdf = Pdf::loadView('laporan.absensi_pdf', compact('mataKuliah', 'absensi'));
    return $pdf->download('laporan-absensi-' . $mataKuliah->kode . '.pdf');
}
}
