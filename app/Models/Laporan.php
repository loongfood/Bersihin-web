<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['user_id', 'kategori_id', 'jadwal_id', 'judul', 'deskripsi', 'lokasi', 'foto', 'status', 'assigned_by', 'assigned_at'];

    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalPengangkutan::class, 'jadwal_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function isAssigned(): bool
    {
        return !is_null($this->jadwal_id);
    }
}
