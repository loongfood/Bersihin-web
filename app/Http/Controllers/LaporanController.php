<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori_id');
        $status = $request->input('status');

        $query = Laporan::with(['user', 'kategori']);

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
            ->paginate(10)
            ->withQueryString();

        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('laporan.index', compact('laporan', 'search', 'kategoriId', 'status', 'kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('laporan.create', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        if (!Auth::user()->hasRole('admin') && $laporan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke laporan ini.');
        }

        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('laporan.edit', compact('laporan', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
