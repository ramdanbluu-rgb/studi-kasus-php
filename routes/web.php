<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ProdukController;


//Route studi kasus Siswa
Route::get('/', [SiswaController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::post('/buku/{kode}/pinjam', [BukuController::class, 'pinjam'])->name('buku.pinjam');
Route::post('/buku/{kode}/kembalikan', [BukuController::class, 'kembalikan'])->name('buku.kembalikan');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/{kode}/beli', [MenuController::class, 'beli'])->name('menu.beli');
Route::post('/menu/reset', [MenuController::class, 'reset'])->name('menu.reset');

//Route studi kasus Kendaraan
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::post('/kendaraan/{kode}/sewa', [KendaraanController::class, 'sewa'])->name('kendaraan.sewa');
Route::post('/kendaraan/{kode}/kembalikan', [KendaraanController::class, 'kembalikan'])->name('kendaraan.kembalikan');
Route::post('/kendaraan/reset', [KendaraanController::class, 'reset'])->name('kendaraan.reset');

//Route studi kasus Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');