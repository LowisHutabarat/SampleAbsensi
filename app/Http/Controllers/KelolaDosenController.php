<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KelolaDosenController extends Controller
{
    public function index()
    {
        $dosens = User::where('role', 'dosen')->get();
        return view('kelola_dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('kelola_dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nomor_induk' => $request->nomor_induk,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dosen',
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dosen = User::findOrFail($id);
        return view('kelola_dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $dosen = User::findOrFail($id);

        $request->validate([
            'nomor_induk' => 'required|unique:users,nomor_induk,' . $dosen->id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $dosen->id,
        ]);

        $dosen->update([
            'nomor_induk' => $request->nomor_induk,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diubah.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
