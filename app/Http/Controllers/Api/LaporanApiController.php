<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::with(['user', 'kategori']);

        if (!$request->user()->hasRole('admin')) {
            $query->where('user_id', $request->user()->id);
        }

        $laporan = $query->latest()->paginate(10);

        return response()->json($laporan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_sampah,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['status'] = 'Menunggu';

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan-foto', 'public');
        }

        $laporan = Laporan::create($validated);

        return response()->json([
            'message' => 'Laporan berhasil dikirim',
            'data' => $laporan->load(['user', 'kategori']),
        ], 201);
    }

    public function show(Request $request, Laporan $laporan)
    {
        if (!$request->user()->hasRole('admin') && $laporan->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke laporan ini.'], 403);
        }

        return response()->json($laporan->load(['user', 'kategori']));
    }

    public function update(Request $request, Laporan $laporan)
    {
        if (!$request->user()->hasRole('admin') && $laporan->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke laporan ini.'], 403);
        }

        $rules = [
            'kategori_id' => 'sometimes|required|exists:kategori_sampah,id',
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'lokasi' => 'sometimes|required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];

        if ($request->user()->hasRole('admin')) {
            $rules['status'] = 'sometimes|required|in:Menunggu,Diproses,Selesai';
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('laporan-foto', 'public');
        }

        $laporan->update($validated);

        return response()->json([
            'message' => 'Laporan berhasil diperbarui',
            'data' => $laporan->load(['user', 'kategori']),
        ]);
    }

    public function destroy(Request $request, Laporan $laporan)
    {
        if (!$request->user()->hasRole('admin') && $laporan->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke laporan ini.'], 403);
        }

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }
}
