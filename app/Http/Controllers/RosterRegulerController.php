<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RosterReguler;
use App\Models\MataKuliah;
use App\Models\User;

class RosterRegulerController extends Controller
{
    public function index(Request $request)
    {
        $query = RosterReguler::query();

        if ($request->filled('prodi')) {
            $query->where('prodi', $request->prodi);
        }

        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }

        $rosters = $query->orderBy('hari')->orderBy('jam_mulai')->get();
        $mataKuliahs = MataKuliah::all();
        $dosens = User::where('role', 'dosen')->get();

        return view('dashboard', compact('rosters', 'mataKuliahs', 'dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi' => 'required|string',
            'semester' => 'required|integer|min:1|max:8',
            'kode_mata_kuliah' => 'required|exists:mata_kuliahs,kode',
            'nomor_induk_dosen' => 'required|exists:users,nomor_induk',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruang' => 'required|string',
        ]);

        $mataKuliah = MataKuliah::where('kode', $request->kode_mata_kuliah)->firstOrFail();
        $dosen = User::where('nomor_induk', $request->nomor_induk_dosen)->firstOrFail();

        RosterReguler::create([
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'kode_mata_kuliah' => $mataKuliah->kode,
            'nama_mata_kuliah' => $mataKuliah->nama,
            'sks' => $mataKuliah->sks,
            'nomor_induk_dosen' => $dosen->nomor_induk,
            'nama_dosen' => $dosen->name,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
        ]);

        return back()->with('success', 'Roster berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $roster = RosterReguler::findOrFail($id);
        $rosters = RosterReguler::orderBy('hari')->orderBy('jam_mulai')->get();
        $mataKuliahs = MataKuliah::all();
        $dosens = User::where('role', 'dosen')->get();

        return view('dashboard', compact('rosters', 'roster', 'mataKuliahs', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi' => 'required|string',
            'semester' => 'required|integer|min:1|max:8',
            'kode_mata_kuliah' => 'required|exists:mata_kuliahs,kode',
            'nomor_induk_dosen' => 'required|exists:users,nomor_induk',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruang' => 'required|string',
        ]);

        $roster = RosterReguler::findOrFail($id);
        $mataKuliah = MataKuliah::where('kode', $request->kode_mata_kuliah)->firstOrFail();
        $dosen = User::where('nomor_induk', $request->nomor_induk_dosen)->firstOrFail();

        $roster->update([
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'kode_mata_kuliah' => $mataKuliah->kode,
            'nama_mata_kuliah' => $mataKuliah->nama,
            'sks' => $mataKuliah->sks,
            'nomor_induk_dosen' => $dosen->nomor_induk,
            'nama_dosen' => $dosen->name,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
        ]);

        return back()->with('success', 'Roster berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $roster = RosterReguler::findOrFail($id);
        $roster->delete();
        return back()->with('success', 'Roster berhasil dihapus.');
    }
}
