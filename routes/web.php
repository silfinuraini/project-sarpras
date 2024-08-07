<?php

use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

Route::get('operator/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator']);
Route::get('operator/data-barang', [DataBarangController::class, 'index'])->name('databarang');

Route::get('operator/tambah-barang', [DataBarangController::class, 'tambahbarang'])->name('item.index');
Route::post('operator/data-barang', [DataBarangController::class, 'store'])->name('item.store');
Route::get('operator/{id}/edit-barang', [DataBarangController::class, 'edit'])->name('item.edit');
Route::put('operator/{id}', [DataBarangController::class, 'update'])->name('item.update');
Route::delete('operator/{id}', [DataBarangController::class, 'destroy'])->name('item.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/kelola-akun', [KelolaAkunController::class, 'index'])->name('kelolaakun');
Route::get('/kelola-akun/tambah-akun', [KelolaAkunController::class, 'store'])->name('akun.store');
