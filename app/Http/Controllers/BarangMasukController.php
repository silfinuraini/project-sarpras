<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\Item;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::all();
        $supplier = Supplier::all();
        $pegawai = Pegawai::all();
        $barangmasuk = BarangMasuk::with('pegawai', 'supplier')->get();
        $detailBM = DetailBarangMasuk::with('item')->get();

        return view('operator.barang-masuk', compact('item', 'barangmasuk', 'supplier', 'detailBM'));
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
        $randomNumber = rand(1000, 9999);
        $kode = 'BM' . $randomNumber;

        $nip = Auth::user()->nip;

        $kodeBarang = $request->input('item');
        $jumlah = count($kodeBarang);

        $kuantiti =  $request->kuantiti;

        $barangmasuk = BarangMasuk::create([
            'kode' => $kode,
            'nip' => $nip,
            'kode_supplier' => $request->kode_supplier,
            'jumlah_item' => $jumlah
        ]);


        for ($i = 0; $i < count($kodeBarang); $i++) {
            $detailBM = DetailBarangMasuk::create([
                'kode_barang_masuk' => $barangmasuk->kode,
                'kode_item' => $kodeBarang[$i],
                'kuantiti' => $kuantiti[$i]
            ]);
        }

        // dd($detailBM->kode_item);

        $item = Item::where('kode', $detailBM->kode_item)->first();

        if ($item) {
            $item->update([
                'stok' => $item->stok + $detailBM->kuantiti
            ]);
        }

        // $randomNumber = rand(1000, 9999);
        // $kode = 'BM' . $randomNumber;
        // $nip = Auth::user()->nip;
        // $kodeBarang = $request->input('item', []);
        // $jumlah = count($kodeBarang);
        // $kuantiti = $request->input('kuantiti', []);

        // $barangmasuk = BarangMasuk::create([
        //     'kode' => $kode,
        //     'nip' => $nip,
        //     'kode_supplier' => $request->kode_supplier,
        //     'jumlah_item' => $jumlah
        // ]);

        // foreach ($kodeBarang as $i => $kode) {
        //     if (isset($kuantiti[$i])) {
        //         $detailBM = DetailBarangMasuk::create([
        //             'kode_barang_masuk' => $barangmasuk->kode,
        //             'kode_item' => $kode,
        //             'kuantiti' => $kuantiti[$i]
        //         ]);

        //         $barang = Item::where('kode', $kode)->first();
        //         if ($barang) {
        //             $barang->stok += $kuantiti[$i];
        //             $barang->save();
        //         }
        //     }
        // }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $supplier = Supplier::all();
        $item = Item::all();
        $pengadaan = Pengadaan::withAggregate('pegawai', 'nama')->get();
        // dd($pengadaan);

        return view('operator.barang-masuk-pengajuan', compact('supplier', 'item', 'pengadaan'));
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
}
