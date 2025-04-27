@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Guru</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $guru->nama }}</h5>
            <p class="card-text">
                <strong>Kecamatan:</strong> {{ $guru->kecamatan->nama ?? '-' }}<br>
                <strong>Sekolah:</strong> {{ $guru->sekolah->nama ?? '-' }}<br>
                <strong>Jabatan:</strong> {{ $guru->jabatan }}<br>
                <strong>Jenjang:</strong> {{ $guru->jenjang }}<br>
                <strong>Jabatan Fungsional:</strong> {{ $guru->jabatan_fungsional }}<br>
                <strong>TMT Jabatan:</strong> {{ $guru->tmt_jabatan }}<br>
                <strong>Golongan Pangkat:</strong> {{ $guru->golongan_pangkat }}<br>
                <strong>TMT Golongan Pangkat:</strong> {{ $guru->tmt_golongan_pangkat }}<br>
                <strong>Jenjang Pendidikan:</strong> {{ $guru->jenjang_pendidikan }}<br>
                <strong>Program Studi:</strong> {{ $guru->prodi }}<br>
                <strong>Angka Kredit:</strong> {{ $guru->angka_kredit }}
            </p>
        </div>
    </div>

    <h3>File PDF Guru</h3>
    @if ($guru->files->count() > 0)
        <ul class="list-group">
            @foreach ($guru->files as $file)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $file->nama_file }}</span>
                    <div>
                        <a href="{{ asset('storage/' . $file->path) }}" class="btn btn-primary btn-sm" target="_blank">Download</a>

                        <form action="{{ route('guru.delete-file', $file->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus file ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada file yang diupload.</p>
    @endif


    <a href="{{ route('guru.index') }}" class="btn btn-secondary mt-4">Kembali</a>
</div>
@endsection
