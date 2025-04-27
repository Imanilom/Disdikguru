@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sekolah</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sekolah.update', $sekolah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $sekolah->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="kecamatan_id" class="form-label">Kecamatan</label>
            <select class="form-select" id="kecamatan_id" name="kecamatan_id" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ $sekolah->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
