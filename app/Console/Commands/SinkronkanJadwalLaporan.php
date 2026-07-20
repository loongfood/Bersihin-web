<?php

namespace App\Console\Commands;

use App\Models\Laporan;
use App\Models\JadwalPengangkutan;
use Illuminate\Console\Command;

class SinkronkanJadwalLaporan extends Command
{
    protected $signature = 'app:sinkronkan-jadwal-laporan';
    protected $description = 'Menghubungkan laporan lama yang belum punya jadwal dengan jadwal yang sudah ada';

    public function handle()
    {
        $laporanTanpaJadwal = Laporan::whereNull('jadwal_id')->get();
        $jumlahTerhubung = 0;

        foreach ($laporanTanpaJadwal as $laporan) {
            $jadwal = JadwalPengangkutan::where('kategori_id', $laporan->kategori_id)->first();

            if ($jadwal) {
                $laporan->update(['jadwal_id' => $jadwal->id]);
                $jumlahTerhubung++;
            }
        }

        $this->info("Selesai! {$jumlahTerhubung} laporan berhasil dihubungkan ke jadwal.");
    }
}
