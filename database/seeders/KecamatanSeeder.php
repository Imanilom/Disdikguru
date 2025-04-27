<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatans = [
            'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang', 'Cicalengka', 
            'Cikancung', 'Cilengkrang', 'Cileunyi', 'Cimaung', 'Cimenyan', 'Ciparay', 'Ciwidey','Dayeuhkolot', 'Ibun', 
            'Katapang', 'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih', 'Margahayu', 'Nagreg', 'Pacet', 
            'Pameungpeuk', 'Pangalengan', 'Paseh', 'Pasirjambu', 'Rancabali', 'Rancaekek', 'Solokanjeruk', 'Soreang'
        ];

        sort($kecamatans); // pastikan urut abjad

        foreach ($kecamatans as $nama) {
            Kecamatan::create(['nama' => $nama]);
        }
    }
}
