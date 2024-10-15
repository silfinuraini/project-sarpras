<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\DetailPengadaan;
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
        $barangmasuk = BarangMasuk::with('pegawai', 'supplier')->orderBy('created_at', 'DESC')->get();
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

            $item = Item::where('kode', $detailBM->kode_item)->first();
    
            if ($item) {
                $item->update([
                    'stok' => $item->stok + $detailBM->kuantiti
                ]);
            }
        }

        // dd($detailBM->kode_item);


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

    }

    /**
     * Show the form for editing the specified resource.
     */
    
    // public function edit(string $kode)
    // {
    //     $supplier = Supplier::all();
    //     $item = Item::all();
    //     $barangmasuk = BarangMasuk::withAggregate('pegawai', 'nama')->get();
    //     $detailBM = DetailBarangMasuk::where('kode_barang_masuk', $kode)
    //     ->with('item')
    //     ->get();


    //     return view('operator.edit-barang-masuk', compact('supplier', 'item', 'barangmasuk', 'detailBM'));
    // }

    public function edit(string $kode)
    {
        $supplier = Supplier::all();
        $item = Item::all();
        $barangmasuk = BarangMasuk::where('kode', $kode)->with('supplier')->where('kode', $kode)->first();
        $detailBM = DetailBarangMasuk::where('kode_barang_masuk', $kode)
        ->with('item') 
        ->get();

        return view('operator.edit-barang-masuk', compact('supplier', 'item', 'barangmasuk', 'detailBM'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
    {
        // dd($request);
        $detailBM = DetailBarangMasuk::where('kode_barang_masuk', $kode)->first();

        $item = Item::where('kode', $detailBM->kode_item)->first();
        if ($item == true) {
            // dd($request->kuantiti);
            if ($detailBM->kuantiti > $request->kuantiti) {
                $item->update([
                    'stok' => $item->stok -  (abs($detailBM->kuantiti - $request->kuantiti)),
                ]);
            }
            else if ($detailBM->kuantiti < $request->kuantiti) {
                $item->update([
                    'stok' => $item->stok +  (abs($detailBM->kuantiti - $request->kuantiti)),
                ]);
            }
            else if ($detailBM->kuantiti == $request->kuantiti) {
                $item->update([
                    'stok' => $item->stok,
                ]);
            }
        }
        
        $detailBM->update([
            'kuantiti' => $request->kuantiti,
        ]); 
        
        return redirect()->route('barangmasuk');
    }


    /**
     * Update the specified resource in storage.
     */

    // public function update(Request $request, string $kode)
    // {
    //     $barangmasuk = BarangMasuk::where('kode', $kode)->first();
    //     dd($barangmasuk);
    //     $barang = Item::where('kode', $request->item)->first();

    //     $barangmasuk->update([
    //         'jumlah_item' => ''
    //     ]);
        
    //     return redirect()->back();
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
