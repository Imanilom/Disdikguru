<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id',
        'nama_file',
        'path',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
