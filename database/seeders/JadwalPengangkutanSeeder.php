<?php

namespace Database\Seeders;

use App\Models\JadwalPengangkutan;
use App\Models\KategoriSampah;
use Illuminate\Database\Seeder;

class JadwalPengangkutanSeeder extends Seeder
{
    public function run(): void
    {
        $organik = KategoriSampah::where('nama', 'Organik')->first();
        $anorganik = KategoriSampah::where('nama', 'Anorganik')->first();
        $b3 = KategoriSampah::where('nama', 'B3 (Bahan Berbahaya)')->first();

        $jadwals = [
            [
                'kategori_id' => $organik->id,
                'hari' => 'Senin',
                'area' => 'Perumahan Blok A',
                'petugas' => 'Budi Santoso',
            ],
            [
                'kategori_id' => $organik->id,
                'hari' => 'Kamis',
                'area' => 'Perumahan Blok B',
                'petugas' => 'Budi Santoso',
            ],
            [
                'kategori_id' => $anorganik->id,
                'hari' => 'Selasa',
                'area' => 'Perumahan Blok A',
                'petugas' => 'Siti Aminah',
            ],
            [
                'kategori_id' => $b3->id,
                'hari' => 'Sabtu',
                'area' => 'Seluruh Area',
                'petugas' => 'Ahmad Fauzi',
            ],
        ];

        foreach ($jadwals as $jadwal) {
            JadwalPengangkutan::create($jadwal);
        }
    }
}
