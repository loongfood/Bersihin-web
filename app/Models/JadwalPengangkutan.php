<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JadwalPengangkutan extends Model
{
    protected $fillable = ['kategori_id', 'hari', 'area', 'petugas'];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'jadwal_id');
    }

    public function estimasiBerikutnya(): Carbon
    {
        $hariMap = [
            'Minggu' => 0, 'Senin' => 1, 'Selasa' => 2, 'Rabu' => 3,
            'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6,
        ];

        $targetHari = $hariMap[$this->hari] ?? 1;

        return Carbon::now()->startOfDay()->next($targetHari);
    }
}
