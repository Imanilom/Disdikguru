@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Daftar Operator</h4>
            <a href="{{ route('operator.create') }}" class="btn btn-primary">
                ➕ Tambah Operator
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($operators as $index => $operator)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $operator->name }}</td>
                        <td>{{ $operator->email }}</td>
                        <td>{{ $operator->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($operators->isEmpty())
            <p class="text-center">Belum ada operator.</p>
        @endif
    </div>
</div>
@endsection
