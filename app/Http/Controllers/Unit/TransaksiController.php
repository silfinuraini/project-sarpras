<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pengadaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menunggu()
    {
        $nip = Auth::user()->nip;

        $permintaan = Permintaan::where('nip', $nip)->get();
        $pengadaan = Pengadaan::where('nip', $nip)->get();
        $kategori = Kategori::all();
        // dd($pengadaan    );

        return view('unit.menunggu-acc', compact('permintaan', 'pengadaan', 'nip', 'kategori'));
    }

    public function disetujui()
    {
        $nip = Auth::user()->nip;
        $kategori = Kategori::all();
        $barangKeluar = BarangKeluar::where('nip', $nip)->get();


        return view('unit.disetujui', compact('barangKeluar', 'nip', 'kategori'));
    }

    public function barangKeluar(string $kode)
    {
        $kategori = Kategori::all();
        $barangKeluar = BarangKeluar::with('pegawai')->where('kode', $kode)->first();
        $detailBarangKeluar = DetailBarangKeluar::where('kode_barang_keluar', $kode)->with('item.kategori')->get();
        // dd($detailBarangKeluar);

        return view('unit.detail-pengambilan', compact('barangKeluar', 'detailBarangKeluar', 'kategori'));
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
    public function updatePengambilan(Request $request, string $kode)
    {

        $barangKeluar = BarangKeluar::where('kode', $kode)->update([
            'status' => $request->status
        ]);

        return redirect()->route('disetujui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
