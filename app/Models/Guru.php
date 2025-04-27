<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kecamatan_id',
        'sekolah_id',
        'jabatan',
        'jenjang',
        'jabatan_fungsional',
        'tmt_jabatan',
        'golongan_pangkat',
        'tmt_golongan_pangkat',
        'jenjang_pendidikan',
        'prodi',
        'angka_kredit',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function files()
    {
        return $this->hasMany(FileGuru::class, 'guru_id');

    }
}
