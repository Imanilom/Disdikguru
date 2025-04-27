@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Sekolah</h1>
    <a href="{{ route('sekolah.create') }}" class="btn btn-primary mb-3">Tambah Sekolah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Sekolah</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekolahs as $sekolah)
                <tr>
                    <td>{{ $sekolah->nama }}</td>
                    <td>{{ $sekolah->kecamatan->nama }}</td>
                    <td>
                        <a href="{{ route('sekolah.edit', $sekolah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sekolah.destroy', $sekolah->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
