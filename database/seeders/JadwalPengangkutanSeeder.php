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
        $elektronik = KategoriSampah::where('nama', 'Elektronik')->first();
        $kaca = KategoriSampah::where('nama', 'Kaca')->first();

        $jadwals = [
            [
                'kategori_id' => $organik->id,
                'hari' => 'Senin',
                'area' => 'Jl. Pandan Wangi I-IV',
                'petugas' => 'Diky Darmawan',
            ],
            [
                'kategori_id' => $organik->id,
                'hari' => 'Kamis',
                'area' => 'Jl. Pandan Wangi V-VIII',
                'petugas' => 'Angga Pajri P',
            ],
            [
                'kategori_id' => $anorganik->id,
                'hari' => 'Selasa',
                'area' => 'Jl. Pandan Wangi I-IV',
                'petugas' => 'Karso',
            ],
            [
                'kategori_id' => $organik->id,
                'hari' => 'Sabtu',
                'area' => 'Seluruh Sekolah',
                'petugas' => 'Budi Santoso',
            ],
            [
                'kategori_id' => $anorganik->id,
                'hari' => 'Rabu',
                'area' => 'Jl. Pandan Wangi V-VIII',
                'petugas' => 'Agus',
            ],
            [
                'kategori_id' => $organik->id,
                'hari' => 'Jumat',
                'area' => 'Seluruh Taman dan Mesjid RW 16',
                'petugas' => 'Dedi Kurniawan',
            ],
            [
                'kategori_id' => $anorganik->id,
                'hari' => 'Jumat',
                'area' => 'Seluruh Taman dan Mesjid RW 16',
                'petugas' => 'Cecep Dadang Rohedi',
            ],
            [
                'kategori_id' => $b3->id,
                'hari' => 'Sabtu',
                'area' => 'Seluruh Area',
                'petugas' => 'Wawan',
            ],
            [
                'kategori_id' => $elektronik->id,
                'hari' => 'Sabtu',
                'area' => 'Seluruh Area',
                'petugas' => 'Wawan',
            ],
            [
                'kategori_id' => $kaca->id,
                'hari' => 'Sabtu',
                'area' => 'Seluruh Area',
                'petugas' => 'Wawan',
            ],
        ];

        foreach ($jadwals as $jadwal) {
            JadwalPengangkutan::create($jadwal);
        }
    }
}
