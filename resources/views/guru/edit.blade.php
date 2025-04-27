@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="kecamatan_id" class="form-label">Kecamatan</label>
            <select class="form-control" id="kecamatan_id" name="kecamatan_id" required>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ $guru->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sekolah_id" class="form-label">Sekolah</label>
            <select class="form-control" id="sekolah_id" name="sekolah_id" required>
                @foreach($sekolahs as $sekolah)
                    <option value="{{ $sekolah->id }}" {{ $guru->sekolah_id == $sekolah->id ? 'selected' : '' }}>
                        {{ $sekolah->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $guru->jabatan }}" required>
        </div>

        <div class="mb-3">
            <label for="jenjang" class="form-label">Jenjang</label>
            <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ $guru->jenjang }}" required>
        </div>

        <div class="mb-3">
            <label for="jabatan_fungsional" class="form-label">Jabatan Fungsional</label>
            <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" value="{{ $guru->jabatan_fungsional }}" required>
        </div>

        <div class="mb-3">
            <label for="tmt_jabatan" class="form-label">TMT Jabatan</label>
            <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" value="{{ $guru->tmt_jabatan }}" required>
        </div>

        <div class="mb-3">
            <label for="golongan_pangkat" class="form-label">Golongan Pangkat</label>
            <input type="text" class="form-control" id="golongan_pangkat" name="golongan_pangkat" value="{{ $guru->golongan_pangkat }}" required>
        </div>

        <div class="mb-3">
            <label for="tmt_golongan_pangkat" class="form-label">TMT Golongan Pangkat</label>
            <input type="date" class="form-control" id="tmt_golongan_pangkat" name="tmt_golongan_pangkat" value="{{ $guru->tmt_golongan_pangkat }}" required>
        </div>

        <div class="mb-3">
            <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
            <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" value="{{ $guru->jenjang_pendidikan }}" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $guru->prodi }}" required>
        </div>

        <div class="mb-3">
            <label for="angka_kredit" class="form-label">Angka Kredit</label>
            <input type="number" step="any" class="form-control" id="angka_kredit" name="angka_kredit" value="{{ $guru->angka_kredit }}" required>
        </div>

        <div class="mb-3">
            <label for="pdf_files" class="form-label">File PDF</label>
            <input type="file" class="form-control" id="pdf_files" name="pdf_files[]" multiple>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
