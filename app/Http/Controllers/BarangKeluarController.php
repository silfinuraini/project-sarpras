<?php

namespace App\Http\Controllers;

use App\Exports\BarangKeluarExport;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::with('pegawai')->get();
        $detailBarangKeluar = DetailBarangKeluar::all();
        return view('operator.barang-keluar', [
            'barangKeluar' => $barangKeluar,
            'detailBarangKeluar' => $detailBarangKeluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export_excel() 
    {
        return Excel::download(new BarangKeluarExport, 'barang_keluar.xlsx');
    }

    public function export_pdf() 
    {
        $barangKeluar = BarangKeluar::with('pegawai')->get();

        $pdf = Pdf::loadView('operator.pdf.barang-keluar', ['barangKeluar' => $barangKeluar]);
        return $pdf->download('laporan_barang_keluar.pdf');
    }

}
