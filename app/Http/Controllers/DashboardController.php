<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\KategoriSampah;
use App\Models\JadwalPengangkutan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $totalLaporan = Laporan::count();
            $laporanMenunggu = Laporan::where('status', 'Menunggu')->count();
            $laporanDiproses = Laporan::where('status', 'Diproses')->count();
            $laporanSelesai = Laporan::where('status', 'Selesai')->count();
            $totalKategori = KategoriSampah::count();
            $totalJadwal = JadwalPengangkutan::count();
            $laporanTerbaru = Laporan::with(['user', 'kategori'])->latest()->take(5)->get();
            $laporanPerKategori = KategoriSampah::withCount('laporan')->get();
        } else {
            $totalLaporan = Laporan::where('user_id', Auth::id())->count();
            $laporanMenunggu = Laporan::where('user_id', Auth::id())->where('status', 'Menunggu')->count();
            $laporanDiproses = Laporan::where('user_id', Auth::id())->where('status', 'Diproses')->count();
            $laporanSelesai = Laporan::where('user_id', Auth::id())->where('status', 'Selesai')->count();
            $totalKategori = null;
            $totalJadwal = null;
            $laporanTerbaru = Laporan::with('kategori')->where('user_id', Auth::id())->latest()->take(5)->get();
            $laporanPerKategori = KategoriSampah::withCount(['laporan' => function ($q) {
                $q->where('user_id', Auth::id());
            }])->get();
        }

        return view('dashboard', compact(
            'totalLaporan', 'laporanMenunggu', 'laporanDiproses', 'laporanSelesai',
            'totalKategori', 'totalJadwal', 'laporanTerbaru', 'laporanPerKategori'
        ));
    }
}
