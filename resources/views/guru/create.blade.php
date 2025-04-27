@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Guru</h1>

    <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="kecamatan_id" class="form-label">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" 
            class="form-control @error('kecamatan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                @endforeach
            </select>

            @error('kecamatan_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sekolah_id" class="form-label">Sekolah</label>
            <select name="sekolah_id" id="sekolah_id" 
                class="form-control @error('sekolah_id') is-invalid @enderror" disabled required>
                <option value="">-- Pilih Sekolah --</option>
            </select>

            @error('sekolah_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>

        <div class="mb-3">
            <label for="jenjang" class="form-label">Jenjang</label>
            <input type="text" class="form-control" id="jenjang" name="jenjang" required>
        </div>

        <div class="mb-3">
            <label for="jabatan_fungsional" class="form-label">Jabatan Fungsional</label>
            <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" required>
        </div>

        <div class="mb-3">
            <label for="tmt_jabatan" class="form-label">TMT Jabatan</label>
            <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" required>
        </div>

        <div class="mb-3">
            <label for="golongan_pangkat" class="form-label">Golongan Pangkat</label>
            <input type="text" class="form-control" id="golongan_pangkat" name="golongan_pangkat" required>
        </div>

        <div class="mb-3">
            <label for="tmt_golongan_pangkat" class="form-label">TMT Golongan Pangkat</label>
            <input type="date" class="form-control" id="tmt_golongan_pangkat" name="tmt_golongan_pangkat" required>
        </div>

        <div class="mb-3">
            <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
            <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" required>
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" required>
        </div>

        <div class="mb-3">
            <label for="angka_kredit" class="form-label">Angka Kredit</label>
            <input type="number" step="any" class="form-control" id="angka_kredit" name="angka_kredit" required>
        </div>

        <div class="mb-3">
            <label for="pdf_files" class="form-label">File PDF</label>
            <input type="file" class="form-control" id="pdf_files" name="pdf_files[]" multiple>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $('#kecamatan_id').on('change', function () {
        var kecamatanId = $(this).val();


        if (kecamatanId) {
            var requestUrl = '{{ url("/sekolah-by-kecamatan") }}/' + kecamatanId;
        
            $.ajax({
                url: requestUrl,
                type: 'GET',
                success: function (data) {
                    $('#sekolah_id').empty().prop('disabled', false);
                    $('#sekolah_id').append('<option value="">-- Pilih Sekolah --</option>');
                    $.each(data, function (key, sekolah) {
                        $('#sekolah_id').append('<option value="' + sekolah.id + '">' + sekolah.nama + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', xhr.status, error); // Log kesalahan
                    alert('Error: ' + xhr.status + ' ' + error); // Alert kesalahan
                }
            });
        } else {
            $('#sekolah_id').empty().prop('disabled', true);
            $('#sekolah_id').append('<option value="">-- Pilih Sekolah --</option>');
        }
    });
});
</script>
@endsection