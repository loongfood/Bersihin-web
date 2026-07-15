<?php

namespace App\Http\Controllers;

use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kategoriSampah = KategoriSampah::when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(3);

        return view('kategori-sampah.index', compact('kategoriSampah', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriSampah::create($validated);

        return redirect()->route('kategori-sampah.index')
            ->with('success', 'Kategori sampah berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(KategoriSampah $kategoriSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriSampah $kategoriSampah)
    {
        return view('kategori-sampah.edit', compact('kategoriSampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriSampah $kategoriSampah)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        ]);

        $kategoriSampah->update($validated);

        return redirect()->route('kategori-sampah.index')
            ->with('success', 'Kategori sampah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriSampah $kategoriSampah)
    {
        $kategoriSampah->delete();

        return redirect()->route('kategori-sampah.index')
            ->with('success', 'Kategori sampah berhasil dihapus.');
    }
}
