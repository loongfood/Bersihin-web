<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class JadwalPengangkutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoriId = $request->input('kategori_id');

        $jadwalPengangkutan = JadwalPengangkutan::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('area', 'like', "%{$search}%")
                      ->orWhere('petugas', 'like', "%{$search}%");
            })
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })
            ->latest()
            ->paginate(2)
            ->withQueryString();

        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('jadwal-pengangkutan.index', compact('jadwalPengangkutan', 'search', 'kategoriId', 'kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('jadwal-pengangkutan.create', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'hari' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'petugas' => 'required|string|max:255',
        ]);

        JadwalPengangkutan::create($validated);

        return redirect()->route('jadwal-pengangkutan.index')
            ->with('success', 'Jadwal pengangkutan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalPengangkutan $jadwalPengangkutan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPengangkutan $jadwalPengangkutan)
    {
        $kategoriList = KategoriSampah::orderBy('nama')->get();

        return view('jadwal-pengangkutan.edit', compact('jadwalPengangkutan', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPengangkutan $jadwalPengangkutan)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'hari' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'petugas' => 'required|string|max:255',
        ]);

        $jadwalPengangkutan->update($validated);

        return redirect()->route('jadwal-pengangkutan.index')
            ->with('success', 'Jadwal pengangkutan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPengangkutan $jadwalPengangkutan)
    {
        $jadwalPengangkutan->delete();

        return redirect()->route('jadwal-pengangkutan.index')
            ->with('success', 'Jadwal pengangkutan berhasil dihapus.');
    }
}
