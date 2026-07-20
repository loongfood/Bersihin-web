<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LaporanApiController;
use App\Http\Controllers\Api\KategoriSampahApiController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('laporan', LaporanApiController::class)->names([
        'index' => 'api.laporan.index',
        'store' => 'api.laporan.store',
        'show' => 'api.laporan.show',
        'update' => 'api.laporan.update',
        'destroy' => 'api.laporan.destroy',
    ]);
    Route::get('/kategori-sampah', [KategoriSampahApiController::class, 'index']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
