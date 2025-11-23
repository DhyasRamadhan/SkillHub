<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KelasController;

Route::get('/', function () {
    return redirect()->route('peserta.index');
});

Route::prefix('peserta')->group(function () {
    Route::get('/', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('/', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/{peserta}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('/{peserta}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/{peserta}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('/{peserta}', [PesertaController::class, 'destroy'])->name('peserta.destroy');

    Route::get('/{peserta}/daftar-kelas', [PesertaController::class, 'daftarKelas'])->name('peserta.daftar.kelas');
    Route::post('/{peserta}/daftar-kelas', [PesertaController::class, 'simpanDaftarKelas'])->name('peserta.simpan.kelas');
});

Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
    Route::get('/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});
