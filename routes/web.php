<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengadaanController as ControllersPengadaanController;
use App\Http\Controllers\PermintaanController;
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

Route::middleware(['auth'])->group(function() {
    //Route admin
    Route::group(['prefix' => '/admin', 'middleware' => ['can:isAdmin']], function() {
        Route::get('/', LoginController::class)->name('dashboard.admin');
    });

    // Route pengawas
    Route::group(['prefix' => '/pengawas', 'middleware' => ['can:isPengawas']], function() {
        Route::get('/', LoginController::class)->name('dashboard.pengawas');
    });
    
    // Route unit
    Route::group(['prefix' => '/unit', 'middleware' => ['can:isUnit']], function() {
        Route::get('/', LoginController::class)->name('dashboard.unit');
    });

    Route::middleware(['can:buatTransaksi'])->group(function() {
        Route::resource('pengadaan', PengadaanController::class);
    });
});

// Route::get('admin/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator'])->name('dashboard.admin');
// Route::get('pengawas/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator'])->name('dashboard.pengawas');
Route::get('operator/data-barang', [DataBarangController::class, 'index'])->name('databarang');

Route::get('operator/tambah-barang', [DataBarangController::class, 'tambahbarang'])->name('item.index');
Route::post('operator/data-barang', [DataBarangController::class, 'store'])->name('item.store');
Route::get('operator/{kode}/edit-barang', [DataBarangController::class, 'edit'])->name('item.edit');
Route::put('operator/{kode}', [DataBarangController::class, 'update'])->name('item.update');
Route::delete('operator/{kode}', [DataBarangController::class, 'destroy'])->name('item.destroy');

Route::get('operator/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('operator/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::delete('operator/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('operator/kelola-akun', [KelolaAkunController::class, 'index'])->name('kelolaakun');
Route::get('operator/kelola-akun/tambah-akun', [KelolaAkunController::class, 'create'])->name('akun.create');
Route::get('operator/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'edit'])->name('akun.edit');
Route::put('operator/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'update'])->name('akun.update');
Route::post('operator/kelola-akun/tambah-akun', [KelolaAkunController::class, 'store'])->name('akun.store');

Route::get('operator/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('operator/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('operator/supplier/{kode}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('operator/supplier/{kode}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('operator/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('operator/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::delete('operator/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('operator/barang-masuk', [BarangMasukController::class, 'index'])->name('barangmasuk');
Route::get('operator/{kode}/barang-masuk', [BarangMasukController::class, 'edit'])->name('barangmasuk.edit');
Route::put('operator/{kode}/barang-masuk', [BarangMasukController::class, 'update'])->name('barangmasuk.update');
Route::post('operator/barang-masuk', action: [BarangMasukController::class, 'store'])->name('barangmasuk.store');

Route::get('operator/pengadaan', [App\Http\Controllers\PengadaanController::class, 'index'])->name('operator.pengadaan');
Route::post('operator/pengadaan', [App\Http\Controllers\PengadaanController::class, 'store'])->name('operator.tambahpengadaan');

Route::get('operator/detailpengadaan/{kode}', [App\Http\Controllers\PengadaanController::class, 'show'])->name('operator.detailpengadaan');
Route::put('operator/{kode}/detailpengadaan', [App\Http\Controllers\PengadaanController::class, 'update'])->name('operator.updatepengadaan');
Route::post('operator/{id}/detailpengadaan', [App\Http\Controllers\PengadaanController::class, 'updateKuantiti'])->name('operator.updatekuantitipengadaan');

Route::get('operator/permintaan', [PermintaanController::class, 'index'])->name('operator.permintaan');
Route::post('operator/permintaan', [PermintaanController::class, 'store'])->name('operator.tambahpermintaan');
Route::get('operator/detailpermintaan/{kode}', [App\Http\Controllers\PermintaanController::class, 'show'])->name('operator.detailpermintaan');
Route::put('operator/{kode}/detailpermintaan', [App\Http\Controllers\PermintaanController::class, 'update'])->name('operator.updatepermintaan');
Route::post('operator/{id}/detailpermintaan', [App\Http\Controllers\PermintaanController::class, 'updateKuantiti'])->name('operator.updatekuantitipermintaan');



Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barangkeluar');



// UNIT
// Route::get('unit/dashboard', [LoginController::class, 'unit'])->name('dashboard.unit');

Route::get('unit/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan');

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::patch('/keranjang/{keranjang}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{keranjang}', [KeranjangController::class, 'destroy'])->name('keranjang.dstroy');
});
