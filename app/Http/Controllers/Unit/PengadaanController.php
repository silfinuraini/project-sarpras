<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\DetailPengadaan;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::all();
        $nip = Auth::user()->nip;
        $unit = Auth::user()->pegawai->nama;
        $kategori = Kategori::all(); 

        $keranjang = Keranjang::where('nip', $nip)->get();

        return view('unit.pengadaan', compact('item', 'keranjang', 'nip', 'kategori', 'unit'));
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
        $nip = Auth::user()->nip;
        $kode = 'PGD' . rand(1000, 9999);

        $keranjang = Keranjang::where('nip', $nip)->get();
        $jumlah = count($keranjang);

        $pengadaan = Pengadaan::create([
            'kode' => $kode,
            'nip' => $nip,
            'status' => 'menunggu',
            'sifat' => $request->sifat,
            'perihal' => $request->perihal,
            'jumlah_item'  => $jumlah
        ]);

        for ($i = 0; $i < count($keranjang); $i++) {
            $detailPengadaan = DetailPengadaan::create([
                'kode_pengadaan' => $pengadaan->kode,
                'kode_item' => $keranjang[$i]->kode_item,
                'kuantiti' => $request->kuantiti[$i],
                'kuantiti_disetujui' => 0
            ]);

            $keranjang[$i]->delete();
        }


        return redirect()->route('dashboard.unit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        $kategori = Kategori::all();
        $pengadaan = Pengadaan::with('pegawai')->where('kode', $kode)->first();
        // dd($pengadaan);
        $detailPengadaan = DetailPengadaan::where('kode_pengadaan', $kode)->with('item.kategori')->get();

        return view('unit.detail-pengadaan', compact('pengadaan', 'detailPengadaan', 'kategori'));
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
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
