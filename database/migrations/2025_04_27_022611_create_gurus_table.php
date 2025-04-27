<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->cascadeOnDelete();
            $table->foreignId('sekolah_id')->constrained('sekolahs')->cascadeOnDelete();
            $table->string('jabatan');
            $table->string('jenjang');
            $table->string('jabatan_fungsional');
            $table->date('tmt_jabatan')->nullable();
            $table->string('golongan_pangkat');
            $table->date('tmt_golongan_pangkat')->nullable();
            $table->string('jenjang_pendidikan');
            $table->string('prodi');
            $table->float('angka_kredit', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
