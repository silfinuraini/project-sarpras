<?php

use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengadaanController as ControllersPengadaanController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Unit\PengadaanController;
use App\Http\Controllers\Unit\PermintaanController as UnitPermintaanController;
use App\Http\Controllers\Unit\TransaksiController;
use App\Models\Item;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $items = Item::all();
    return view('welcome', compact('items'));
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
        Route::get('/', [LoginController::class, 'index'])->name('dashboard.admin');
    });

    // Route pengawas
    Route::group(['prefix' => '/pengawas', 'middleware' => ['can:isPengawas']], function() {
        Route::get('/', [LoginController::class, 'index'])->name('dashboard.pengawas');
    });
    
    // Route unit
    Route::group(['prefix' => '/unit', 'middleware' => ['can:isUnit']], function() {
        Route::get('/', [LoginController::class, 'index'])->name('dashboard.unit');
    });

    Route::middleware(['can:buatTransaksi'])->group(function() {
        Route::resource('pengadaan', PengadaanController::class);
    });
});

// Route::get('admin/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator'])->name('dashboard.admin');
// Route::get('pengawas/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'operator'])->name('dashboard.pengawas');
Route::get('operator/data-barang', [DataBarangController::class, 'index'])->name('databarang');
Route::get('operator/data-barang/export-excel', [DataBarangController::class, 'export_excel'])->name('databarang.excel');
Route::get('operator/data-barang/export-pdf', [DataBarangController::class, 'export_pdf'])->name('databarang.pdf');
Route::post('operator/data-barang/import', [DataBarangController::class, 'import'])->name('databarang.import');
Route::get('operator/data-barang/format', [DataBarangController::class, 'format'])->name('databarang.format');

Route::get('operator/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('operator/{kode}/detail-laporan', [LaporanController::class, 'detailLaporan'])->name('laporan.detail');
Route::get('operator/laporan/export-excel', [LaporanController::class, 'export_excel'])->name('laporan.excel');
Route::get('operator/laporan/export-pdf', [LaporanController::class, 'export_pdf'])->name('laporan.pdf');

Route::get('operator/tambah-barang', [DataBarangController::class, 'tambahbarang'])->name('item.index');
Route::post('operator/data-barang', [DataBarangController::class, 'store'])->name('item.store');
Route::get('operator/{kode}/edit-barang', [DataBarangController::class, 'edit'])->name('item.edit');
Route::put('operator/{kode}', [DataBarangController::class, 'update'])->name('item.update');
Route::delete('operator/{kode}', [DataBarangController::class, 'destroy'])->name('item.destroy');

Route::get('operator/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('operator/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('oprator/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('operator/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('operator/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('operator/kelola-akun', [KelolaAkunController::class, 'index'])->name('kelolaakun');
Route::get('operator/kelola-akun/tambah-akun', [KelolaAkunController::class, 'create'])->name('akun.create');
Route::get('operator/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'edit'])->name('akun.edit');
Route::put('operator/kelola-akun/{nip}/edit-akun', [KelolaAkunController::class, 'update'])->name('akun.update');
Route::post('operator/kelola-akun/tambah-akun', [KelolaAkunController::class, 'store'])->name('akun.store');

Route::get('operator/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('operator/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('oprator/supplier/{kode}/edit', [SupplierController::class, 'edit'])->name('kategori.edit');
Route::put('operator/supplier/{kode}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('operator/supplier/{kode}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('operator/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('operator/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::put('operator/pegawai/{nip}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('operator/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('operator/barang-masuk', [BarangMasukController::class, 'index'])->name('barangmasuk');
Route::get('operator/barang-masuk/tambah', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
Route::get('operator/{kode}/barang-masuk', [BarangMasukController::class, 'edit'])->name('barangmasuk.edit');
Route::put('operator/{kode}/barang-masuk', [BarangMasukController::class, 'update'])->name('barangmasuk.update');
Route::post('operator/barang-masuk',  [BarangMasukController::class, 'store'])->name('barangmasuk.store');
Route::put('operator/{kode}/barang-masuk/berita-acara', [BarangMasukController::class, 'updateBeritaAcara'])->name('barangmasuk.berita.acara');
Route::get('operator/barang-masuk/export-excel', [BarangMasukController::class, 'export_excel'])->name('barangmasuk.excel');
Route::get('operator/detail-barang-masuk/export-excel/{kode}', [BarangMasukController::class, 'export_excel_detail'])->name('barangmasuk.detail.excel');
Route::get('operator/barang-masuk/export-pdf', [BarangMasukController::class, 'export_pdf'])->name('barangmasuk.pdf');
Route::get('operator/detail-barang-masuk/export-pdf/{kode}', [BarangMasukController::class, 'export_pdf_detail'])->name('barangmasuk.detail.pdf');

Route::get('operator/pengadaan', [App\Http\Controllers\PengadaanController::class, 'index'])->name('operator.pengadaan');
Route::post('operator/pengadaan', [App\Http\Controllers\PengadaanController::class, 'store'])->name('operator.tambahpengadaan');
Route::get('operator/pengadaan/export-excel', [App\Http\Controllers\PengadaanController::class, 'export_excel'])->name('operator.pengadaan.excel');
Route::get('operator/detail-pengadaan/export-excel/{kode}', [App\Http\Controllers\PengadaanController::class, 'export_excel_detail'])->name('operator.pengadaan.detail.excel');
Route::get('operator/pengadaan/export-pdf', [App\Http\Controllers\PengadaanController::class, 'export_pdf'])->name('operator.pengadaan.pdf');
Route::get('operator/detail-pengadaan/export-pdf/{kode}', [App\Http\Controllers\PengadaanController::class, 'export_pdf_detail'])->name('operator.pengadaan.detail.pdf');

Route::get('operator/detailpengadaan/{kode}', [App\Http\Controllers\PengadaanController::class, 'show'])->name('operator.detailpengadaan');
Route::get('operator/editpengadaan/{kode}', [App\Http\Controllers\PengadaanController::class, 'edit'])->name('operator.editpengadaan');
Route::put('operator/{kode}/detailpengadaan', [App\Http\Controllers\PengadaanController::class, 'update'])->name('operator.updatepengadaan');
Route::post('operator/{id}/detailpengadaan', [App\Http\Controllers\PengadaanController::class, 'updateKuantitiDisetujui'])->name('operator.updatekuantitipengadaan');
Route::put('operator/{kode}/editpengadaan', [App\Http\Controllers\PengadaanController::class, 'updateKuantiti'])->name('operator.updatekuantiti');

Route::get('operator/permintaan', [PermintaanController::class, 'index'])->name('operator.permintaan');
Route::post('operator/permintaan', [PermintaanController::class, 'store'])->name('operator.tambahpermintaan');
Route::get('operator/detailpermintaan/{kode}', [PermintaanController::class, 'show'])->name('operator.detailpermintaan');
Route::put('operator/{kode}/detailpermintaan', [PermintaanController::class, 'update'])->name('operator.updatepermintaan');
Route::post('operator/{id}/detailpermintaan', [PermintaanController::class, 'updateKuantitiDisetujui'])->name('operator.updatekuantitipermintaan');
Route::get('operator/permintaan/export-excel', [PermintaanController::class, 'export_excel'])->name('operator.permintaan.excel');
Route::get('operator/detail-permintaan/export-excel/{kode}', [PermintaanController::class, 'export_excel_detail'])->name('operator.permintaan.detail.excel');
Route::get('operator/permintaan/export-pdf', [PermintaanController::class, 'export_pdf'])->name('operator.permintaan.pdf');
Route::get('operator/detail-permintaan/export-pdf/{kode}', [PermintaanController::class, 'export_pdf_detail'])->name('operator.permintaan.detail.pdf');

Route::get('barang-keluar', [BarangKeluarController::class, 'index'])->name('barangkeluar');
Route::get('barang-keluar/export-excel', [BarangKeluarController::class, 'export_excel'])->name('barangkeluar.excel');
Route::get('barang-keluar/detail-export-excel/{kode}', [BarangKeluarController::class, 'export_excel_detail'])->name('barangkeluar.detail.excel');
Route::get('barang-keluar/export-pdf', [BarangKeluarController::class, 'export_pdf'])->name('barangkeluar.pdf');
Route::get('detail-barang-keluar/export-pdf/{kode}', [BarangKeluarController::class, 'export_pdf_detail'])->name('barangkeluar.detail.pdf');

// UNIT
// Route::get('unit/dashboard', [LoginController::class, 'unit'])->name('dashboard.unit');

Route::get('unit/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan');
Route::get('unit/detail-pengadaan/{kode}', [PengadaanController::class, 'show'])->name('pengadaan.show');
Route::post('unit/pengadaan', [PengadaanController::class, 'store'])->name('pengadaan.store');

Route::get('unit/permintaan', [UnitPermintaanController::class, 'index'])->name('permintaan');
Route::get('unit/detail-permintaan/{kode}', [UnitPermintaanController::class, 'show'])->name('permintaan.show');
Route::post('unit/permintaan/tambah', [UnitPermintaanController::class, 'store'])->name('permintaan.store');

Route::get('unit/menunggu', [TransaksiController::class, 'menunggu'])->name('menunggu');
Route::get('unit/disetujui', [TransaksiController::class, 'disetujui'])->name('disetujui');

Route::get('unit/pengambilan/{kode}', [TransaksiController::class, 'barangKeluar'])->name('pengambilan');
Route::post('unit/diambil/{kode}', [TransaksiController::class, 'updatePengambilan'])->name('pengambilan.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::patch('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
});


