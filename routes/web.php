<?php

use App\Http\Controllers\DataBarangController;
use Illuminate\Support\Facades\Route;

Route::prefix('databarang')->group(function () {
    // Menampilkan daftar barang
    Route::get('/', [DataBarangController::class, 'index'])->name('databarang.index');
    
    Route::get('/create', [DataBarangController::class, 'create'])->name('databarang.create');
    Route::post('/', [DataBarangController::class, 'store'])->name('databarang.simpan');
    
    // Menampilkan form edit barang
    Route::get('/{id}/edit', [DataBarangController::class, 'edit'])->name('databarang.edit');
    
    // Memperbarui barang
    Route::put('/{id}', [DataBarangController::class, 'update'])->name('databarang.update');
    
    // Menghapus barang
    Route::delete('/{id}', [DataBarangController::class, 'destroy'])->name('databarang.destroy');
    
    // Menampilkan detail barang
    Route::get('/{id}', [DataBarangController::class, 'show'])->name('databarang.show');
});