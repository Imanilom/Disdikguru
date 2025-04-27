<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kecamatan;
use App\Models\Sekolah;
use App\Models\GuruFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    // Menampilkan semua guru
    public function index()
    {
        $gurus = Guru::with(['sekolah', 'kecamatan'])->get();
        return view('guru.index', compact('gurus'));
    }

    // Menampilkan form tambah guru
    public function create()
    {
        $kecamatans = Kecamatan::all();
        $sekolahs = Sekolah::all();
        return view('guru.create', compact('kecamatans', 'sekolahs'));
    }

    // Menyimpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'jabatan' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'jabatan_fungsional' => 'required|string|max:255',
            'tmt_jabatan' => 'required|date',
            'golongan_pangkat' => 'required|string|max:255',
            'tmt_golongan_pangkat' => 'required|date',
            'jenjang_pendidikan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'angka_kredit' => 'required|numeric',
        ]);

        $guru = Guru::create($request->all());

        // Jika ada file PDF yang diupload
        if ($request->hasFile('pdf_files')) {
            foreach ($request->file('pdf_files') as $file) {
                $path = $file->store('pdfs', 'public');
                $guru->files()->create([
                    'nama_file' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    // Menampilkan form edit guru
    public function edit(Guru $guru)
    {
        $kecamatans = Kecamatan::all();
        $sekolahs = Sekolah::all();
        return view('guru.edit', compact('guru', 'kecamatans', 'sekolahs'));
    }

    // Menyimpan perubahan data guru
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'jabatan' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'jabatan_fungsional' => 'required|string|max:255',
            'tmt_jabatan' => 'required|date',
            'golongan_pangkat' => 'required|string|max:255',
            'tmt_golongan_pangkat' => 'required|date',
            'jenjang_pendidikan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'angka_kredit' => 'required|numeric',
        ]);

        $guru->update($request->all());

        // Jika ada file PDF baru
        if ($request->hasFile('pdf_files')) {
            foreach ($request->file('pdf_files') as $file) {
                $path = $file->store('pdfs', 'public');
                $guru->files()->create([
                    'nama_file' => $file->getClientOriginalName(),
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    // Menghapus guru
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }

    public function show($id)
    {
        $guru = Guru::with(['kecamatan', 'sekolah', 'files'])->findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function downloadFile($id)
    {
        $file = GuruFile::findOrFail($id);
        return Storage::disk('public')->download($file->path, $file->nama_file);
    }

    public function deleteFile($id)
    {
        $file = FileGuru::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($file->path)) {
            Storage::disk('public')->delete($file->path);
        }

        // Hapus record dari database
        $file->delete();

        return back()->with('success', 'File berhasil dihapus.');
    }

}
