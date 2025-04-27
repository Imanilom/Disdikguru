<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    // Menampilkan semua sekolah di Kabupaten Bandung
    public function index()
    {
        $sekolahs = Sekolah::with('kecamatan')->get();
        return view('sekolah.index', compact('sekolahs'));
    }

    // Menampilkan form tambah sekolah
    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('sekolah.create', compact('kecamatans'));
    }

    // Menyimpan sekolah baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        Sekolah::create([
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id,
        ]);

        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil ditambahkan.');
    }

    // Menampilkan form edit sekolah
    public function edit(Sekolah $sekolah)
    {
        $kecamatans = Kecamatan::all();
        return view('sekolah.edit', compact('sekolah', 'kecamatans'));
    }

    // Menyimpan perubahan sekolah
    public function update(Request $request, Sekolah $sekolah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);

        $sekolah->update([
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id,
        ]);

        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil diperbarui.');
    }

    // Menghapus sekolah
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil dihapus.');
    }
}
