<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\KategoriSampah;
use App\Models\JadwalPengangkutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori_id');
        $status = $request->input('status');

        $query = Laporan::with(['user', 'kategori', 'jadwal', 'assignedBy']);

        if (!Auth::user()->hasRole('admin')) {
            $query->where('user_id', Auth::id());
        }

        $laporan = $query
            ->when($search, function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            })
            ->when($kategoriId, function ($q) use ($kategoriId) {
                $q->where('kategori_id', $kategoriId);
            })
            ->when($status, function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $kategoriList = KategoriSampah::orderBy('nama')->get();
        $jadwalList = JadwalPengangkutan::orderBy('hari')->get();

        return view('laporan.index', compact('laporan', 'search', 'kategoriId', 'status', 'kategoriList', 'jadwalList'));
    }

    public function create()
    {
        if (Auth::user()->hasRole('admin')) {
            abort(403, 'Admin tidak dapat membuat laporan.');
        }

        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('laporan.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            abort(403, 'Admin tidak dapat membuat laporan.');
        }

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'Menunggu';

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan-foto', 'public');
        }

        Laporan::create($validated);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim.');
    }

    public function show(Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin') && $laporan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        $laporan->load(['user', 'kategori', 'jadwal', 'assignedBy']);

        return view('laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin') && $laporan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('laporan.edit', compact('laporan', 'kategoriList'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin') && $laporan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        $rules = [
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if (Auth::user()->hasRole('admin')) {
            $rules['status'] = 'required|in:Menunggu,Diproses,Selesai';
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('laporan-foto', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function assign(Request $request, Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki akses untuk melakukan ini.');
        }

        $validated = $request->validate([
            'jadwal_id' => 'required|exists:jadwal_pengangkutans,id',
        ]);

        $laporan->update([
            'jadwal_id' => $validated['jadwal_id'],
            'assigned_by' => Auth::id(),
            'assigned_at' => now(),
            'status' => 'Diproses',
        ]);

        return redirect()->back()
            ->with('success', 'Laporan berhasil dijadwalkan.');
    }

    public function destroy(Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin') && $laporan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}
