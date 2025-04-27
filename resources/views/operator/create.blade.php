@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4 shadow-sm">
        <h4>Tambah Operator Baru</h4>

        <form action="{{ route('operator.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name') }}" required>

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" required>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    required>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                    class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Operator</button>
            <a href="{{ route('operator.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
