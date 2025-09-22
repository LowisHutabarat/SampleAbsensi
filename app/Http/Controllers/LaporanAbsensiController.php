<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SesiKuliah;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanAbsensiController extends Controller
{
    public function index()
    {
        $dosen = Auth::user();

        // Eager load absensi dan mahasiswa secara eksplisit
        $sesis = SesiKuliah::with(['absensi' => function ($query) {
            $query->with('mahasiswa');
        }])
        ->where('nomor_induk_dosen', $dosen->nomor_induk)
        ->orderBy('pertemuan')
        ->get();

        return view('laporan.absensi_pdf', compact('dosen', 'sesis'));
    }

    public function cetakPDF()
    {
        $dosen = Auth::user();

        // Eager load absensi dan mahasiswa juga di sini
        $sesis = SesiKuliah::with(['absensi' => function ($query) {
            $query->with('mahasiswa');
        }])
        ->where('nomor_induk_dosen', $dosen->nomor_induk)
        ->orderBy('pertemuan')
        ->get();

        $pdf = Pdf::loadView('laporan.absensi_pdf', compact('dosen', 'sesis'));
        return $pdf->download('laporan_absensi.pdf');
    }
}
