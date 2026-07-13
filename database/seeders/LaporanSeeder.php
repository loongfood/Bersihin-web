<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\KategoriSampah;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $organik = KategoriSampah::where('nama', 'Organik')->first();
        $anorganik = KategoriSampah::where('nama', 'Anorganik')->first();
        $warga = User::where('email', 'warga@bersihin.com')->first();
        $admin = User::where('email', 'admin@bersihin.com')->first();

        $laporans = [
            [
                'user_id' => $warga->id,
                'kategori_id' => $organik->id,
                'judul' => 'Tumpukan sampah dapur di pinggir jalan',
                'deskripsi' => 'Sudah 2 hari tidak diangkut, mulai berbau tidak sedap',
                'lokasi' => 'Jl. Melati No. 5',
                'foto' => null,
                'status' => 'Menunggu',
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $anorganik->id,
                'judul' => 'Botol plastik menumpuk di selokan',
                'deskripsi' => 'Menyumbat aliran air, berisiko banjir saat hujan',
                'lokasi' => 'Jl. Kenanga No. 12',
                'foto' => null,
                'status' => 'Diproses',
            ],
            [
                'user_id' => $admin->id,
                'kategori_id' => $organik->id,
                'judul' => 'Daun kering menumpuk di taman',
                'deskripsi' => 'Sudah dibersihkan oleh petugas kebersihan',
                'lokasi' => 'Taman RW 03',
                'foto' => null,
                'status' => 'Selesai',
            ],
        ];

        foreach ($laporans as $laporan) {
            Laporan::create($laporan);
        }
    }
}
