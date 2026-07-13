<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\JadwalPengangkutanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kategori-sampah', KategoriSampahController::class);
    Route::resource('jadwal-pengangkutan', JadwalPengangkutanController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('laporan', LaporanController::class);
});

require __DIR__.'/auth.php';
