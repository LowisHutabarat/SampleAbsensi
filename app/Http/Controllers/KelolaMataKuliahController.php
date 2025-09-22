<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaMataKuliahController extends Controller
{
    /* ========== INDEX ========== */
    public function index()
    {
        $matakuliahs = MataKuliah::with('dosens')->get();
        return view('kelola_mata_kuliah.index', compact('matakuliahs'));
    }

    /* ========== CREATE ========== */
    public function create()
    {
        $dosens = User::where('role', 'dosen')->orderBy('name')->get();
        return view('kelola_mata_kuliah.create', compact('dosens'));
    }

    /* ========== STORE ========== */
    public function store(Request $request)
    {
        $request->validate([
            'kode'               => 'required|unique:mata_kuliahs,kode',
            'nama'               => 'required',
            'sks'                => 'required|integer|min:1',
            'nomor_induk_dosen'  => 'nullable|exists:users,nomor_induk',   // opsional
        ]);

        // Simpan kolom inti saja
        $mataKuliah = MataKuliah::create($request->only(['kode', 'nama', 'sks']));

        // Tambah relasi dosen (jika dipilih)
        if ($request->filled('nomor_induk_dosen')) {
            $mataKuliah->dosens()->attach($request->nomor_induk_dosen);
        }

        return redirect()->route('mata-kuliah.index')
                         ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /* ========== EDIT ========== */
    public function edit($id)
    {
        $matakuliah = MataKuliah::with('dosens')->findOrFail($id);
        $dosens     = User::where('role', 'dosen')->orderBy('name')->get();

        return view('kelola_mata_kuliah.edit', compact('matakuliah', 'dosens'));
    }

    /* ========== UPDATE ========== */
    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

        $request->validate([
            'kode'               => 'required|unique:mata_kuliahs,kode,' . $id,
            'nama'               => 'required',
            'sks'                => 'required|integer|min:1',
            'nomor_induk_dosen'  => 'nullable|exists:users,nomor_induk',
        ]);

        $mataKuliah->update($request->only(['kode', 'nama', 'sks']));

        // Sinkron (0 atau 1 dosen; jika multi → kirimkan array)
        $mataKuliah->dosens()->sync(
            $request->filled('nomor_induk_dosen') ? [$request->nomor_induk_dosen] : []
        );

        return redirect()->route('mata-kuliah.index')
                         ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /* ========== DESTROY ========== */
    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);

        // Bersihkan relasi pivot dulu
        $mataKuliah->dosens()->detach();
        $mataKuliah->delete();

        return back()->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
