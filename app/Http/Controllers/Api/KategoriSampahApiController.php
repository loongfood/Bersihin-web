<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriSampah;

class KategoriSampahApiController extends Controller
{
    public function index()
    {
        $kategori = KategoriSampah::orderBy('nama')->get();

        return response()->json($kategori);
    }
}
