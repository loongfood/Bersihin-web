<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPengangkutan extends Model
{
    protected $fillable = ['kategori_id', 'hari', 'area', 'petugas'];

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }
}
