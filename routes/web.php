<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Unit\PengadaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('operator/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator'])->name('dashboardOP');
Route::get('operator/data-barang', [DataBarangController::class, 'index'])->name('databarang');

Route::get('operator/tambah-barang', [DataBarangController::class, 'tambahbarang'])->name('item.index');
Route::post('operator/data-barang', [DataBarangController::class, 'store'])->name('item.store');
Route::get('operator/{kode}/edit-barang', [DataBarangController::class, 'edit'])->name('item.edit');
Route::put('operator/{kode}', [DataBarangController::class, 'update'])->name('item.update');
Route::delete('operator/{kode}', [DataBarangController::class, 'destroy'])->name('item.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/kelola-akun', [KelolaAkunController::class, 'index'])->name('kelolaakun');
Route::get('/kelola-akun/tambah-akun', [KelolaAkunController::class, 'create'])->name('akun.create');
Route::get('/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'edit'])->name('akun.edit');
Route::put('/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'update'])->name('akun.update');
Route::post('/kelola-akun/tambah-akun', [KelolaAkunController::class, 'store'])->name('akun.store');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('/supplier/{kode}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{kode}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barangmasuk');
Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barangmasuk.store');

Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barangkeluar');



// UNIT
Route::get('unit/dashboard', [LoginController::class, 'unit'])->name('dashboardUnit');

Route::get('unit/pengajuan', [PengadaanController::class, 'index'])->name('pengadaan');
