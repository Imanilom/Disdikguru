@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h3>Selamat Datang, {{ auth()->user()->name }}!</h3>
        <p>Anda dapat mengelola data sekolah dan guru di sini.</p>

        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <a href="{{ route('guru.index') }}" class="btn btn-outline-primary w-100">
                    📚 Input Data Guru
                </a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('sekolah.index') }}" class="btn btn-outline-success w-100">
                    🏫 Input Data Sekolah
                </a>
            </div>
            @if(auth()->user()->role == 'admin')
            <div class="col-md-6">
                <a href="{{ route('operator.index') }}" class="btn btn-outline-warning w-100">
                    👤 Manajemen Operator
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
