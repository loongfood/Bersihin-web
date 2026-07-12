<?php

namespace Database\Seeders;

use App\Models\KategoriSampah;
use Illuminate\Database\Seeder;

class KategoriSampahSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            [
                'nama' => 'Organik',
                'deskripsi' => 'Sampah yang bisa terurai secara alami, seperti sisa makanan, daun, dan ranting',
            ],
            [
                'nama' => 'Anorganik',
                'deskripsi' => 'Sampah yang sulit terurai, seperti plastik, kertas, dan logam',
            ],
            [
                'nama' => 'B3 (Bahan Berbahaya)',
                'deskripsi' => 'Sampah berbahaya seperti baterai, lampu bekas, dan bahan kimia',
            ],
            [
                'nama' => 'Elektronik',
                'deskripsi' => 'Sampah elektronik seperti handphone rusak, kabel, dan komponen elektronik',
            ],
            [
                'nama' => 'Kaca',
                'deskripsi' => 'Sampah berbahan kaca seperti botol dan pecahan kaca',
            ],
        ];

        foreach ($kategoris as $kategori) {
            KategoriSampah::create($kategori);
        }
    }
}
