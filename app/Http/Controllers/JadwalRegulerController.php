<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalRegulerController extends Controller
{
    public function index()
    {
        $dosen = Auth::user();

        $jadwal = $dosen->jadwalDosen()
                        ->select('hari', 'jam_mulai', 'jam_selesai', 'ruang', 'nama_mata_kuliah as matkul')
                        ->orderBy('hari')
                        ->orderBy('jam_mulai')
                        ->get();

        return view('jadwal_reguler.index', compact('jadwal', 'dosen'));

    }
}
