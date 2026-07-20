<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\KategoriSampah;
use App\Models\JadwalPengangkutan;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $organik = KategoriSampah::where('nama', 'Organik')->first();
        $anorganik = KategoriSampah::where('nama', 'Anorganik')->first();
        $b3 = KategoriSampah::where('nama', 'B3 (Bahan Berbahaya)')->first();
        $elektronik = KategoriSampah::where('nama', 'Elektronik')->first();
        $kaca = KategoriSampah::where('nama', 'Kaca')->first();

        $warga = User::where('email', 'warga@bersihin.com')->first();
        $admin = User::where('email', 'admin@bersihin.com')->first();

        $jadwalOrganikKamis = JadwalPengangkutan::where('kategori_id', $organik->id)->where('hari', 'Kamis')->first();
        $jadwalAnorganikSelasa = JadwalPengangkutan::where('kategori_id', $anorganik->id)->where('hari', 'Selasa')->first();
        $jadwalB3Sabtu = JadwalPengangkutan::where('kategori_id', $b3->id)->where('hari', 'Sabtu')->first();
        $jadwalKacaSabtu = JadwalPengangkutan::where('kategori_id', $kaca->id)->where('hari', 'Sabtu')->first();

        $laporans = [
            [
                'user_id' => $warga->id,
                'kategori_id' => $organik->id,
                'judul' => 'Tumpukan sampah dapur di pinggir jalan',
                'deskripsi' => 'Sudah 2 hari tidak diangkut, mulai berbau tidak sedap',
                'lokasi' => 'Jl. Pandan Wangi II',
                'foto' => null,
                'status' => 'Menunggu',
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $organik->id,
                'judul' => 'Daun dan ranting menumpuk di halaman warga',
                'deskripsi' => 'Sisa pemangkasan pohon belum diangkut',
                'lokasi' => 'Jl. Pandan Wangi VIII',
                'foto' => null,
                'status' => 'Diproses',
                'jadwal_id' => $jadwalOrganikKamis?->id,
                'assigned_by' => $admin->id,
                'assigned_at' => now()->subDay(),
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $anorganik->id,
                'judul' => 'Botol plastik menumpuk di selokan',
                'deskripsi' => 'Menyumbat aliran air, berisiko banjir saat hujan',
                'lokasi' => 'Jl. Pandan Wangi III',
                'foto' => null,
                'status' => 'Selesai',
                'jadwal_id' => $jadwalAnorganikSelasa?->id,
                'assigned_by' => $admin->id,
                'assigned_at' => now()->subDays(3),
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $anorganik->id,
                'judul' => 'Kemasan kardus dan plastik menumpuk',
                'deskripsi' => 'Bekas belanja online warga sekitar, sudah menumpuk seminggu',
                'lokasi' => 'Jl. Pandan Wangi V',
                'foto' => null,
                'status' => 'Menunggu',
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $b3->id,
                'judul' => 'Baterai bekas menumpuk di pinggir sekolah',
                'deskripsi' => 'Perlu penanganan khusus karena bahan berbahaya',
                'lokasi' => 'SMAN 1 Cileunyi',
                'foto' => null,
                'status' => 'Diproses',
                'jadwal_id' => $jadwalB3Sabtu?->id,
                'assigned_by' => $admin->id,
                'assigned_at' => now()->subHours(6),
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $elektronik->id,
                'judul' => 'TV dan kipas angin rusak dibuang warga',
                'deskripsi' => 'Sudah tidak terpakai, menumpuk di pinggir jalan',
                'lokasi' => 'Jl Pandan Wangi IV',
                'foto' => null,
                'status' => 'Menunggu',
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $kaca->id,
                'judul' => 'Pecahan botol kaca berserakan',
                'deskripsi' => 'Berbahaya bagi anak-anak yang bermain di sekitar',
                'lokasi' => 'Jl. Pandan Wangi I',
                'foto' => null,
                'status' => 'Selesai',
                'jadwal_id' => $jadwalKacaSabtu?->id,
                'assigned_by' => $admin->id,
                'assigned_at' => now()->subDays(2),
            ],
            [
                'user_id' => $warga->id,
                'kategori_id' => $organik->id,
                'judul' => 'Sampah menumpuk di depan masjid',
                'deskripsi' => 'Sisa kegiatan pengajian mingguan belum diangkut',
                'lokasi' => 'Mesjid Mallikul Hikmah',
                'foto' => null,
                'status' => 'Menunggu',
            ],
        ];

        foreach ($laporans as $laporan) {
            Laporan::create($laporan);
        }
    }
}
