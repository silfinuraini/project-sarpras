<?php

namespace App\Http\Controllers;

use App\Exports\BarangKeluarExport;
use App\Exports\DetailBarangKeluarExport;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('pegawai')->get();
        $detailBarangKeluar = DetailBarangKeluar::all();
        return view('operator.barang-keluar', [
            'barangKeluar' => $barangKeluar,
            'detailBarangKeluar' => $detailBarangKeluar
        ]);
    }

    public function export_excel_detail(string $kode) 
    {
        return Excel::download(new DetailBarangKeluarExport($kode), 'detail_barang_keluar.xlsx');
    }

    public function export_pdf() 
    {
        $barangKeluar = BarangKeluar::with('pegawai')->get();

        $pdf = Pdf::loadView('operator.pdf.barang-keluar', ['barangKeluar' => $barangKeluar]);
        return $pdf->download('laporan_barang_keluar.pdf');
    }

    public function export_pdf_detail(string $kode) 
    {
        $detailBarangKeluar = DetailBarangKeluar::where('kode_barang_keluar', $kode)->with('item')->get();

        $pdf = Pdf::loadView('operator.pdf.detail-barang-keluar', ['detailBarangKeluar' => $detailBarangKeluar]);
        return $pdf->download('laporan_barang_keluar.pdf');
    }
}
