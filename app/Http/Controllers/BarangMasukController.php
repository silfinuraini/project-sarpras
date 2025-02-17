<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
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
        $barangmasuk = BarangMasuk::with('pegawai', 'supplier')->orderBy('created_at', 'DESC')->paginate(5);
        $detailBM = DetailBarangMasuk::with('item')->get();

        return view('operator.barang-masuk', compact('item', 'barangmasuk', 'supplier', 'detailBM'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = Item::all();
        $supplier = Supplier::all();

        return view('operator.tambah-barang-masuk', compact('item', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'kode_supplier' => 'required',
                'item' => 'required|array|min:1',
                'kuantiti' => 'required|array|min:1',
            ]);

            $randomNumber = rand(1000, 9999);
            $kode = 'BM' . $randomNumber;

            $nip = Auth::user()->nip;

            $kodeBarang = $request->input('item');
            $jumlah = count($kodeBarang);
            $kuantiti = $request->input('kuantiti');

            $barangmasuk = BarangMasuk::create([
                'kode' => $kode,
                'nip' => $nip,
                'kode_supplier' => $request->kode_supplier,
                'jumlah_item' => $jumlah
            ]);

            foreach ($kodeBarang as $i => $kodeItem) {
                $detailBM = DetailBarangMasuk::create([
                    'kode_barang_masuk' => $barangmasuk->kode,
                    'kode_item' => $kodeItem,
                    'kuantiti' => $kuantiti[$i]
                ]);

                $item = Item::where('kode', $kodeItem)->first();
                if ($item) {
                    $item->update([
                        'stok' => $item->stok + $detailBM->kuantiti
                    ]);
                }
            }

            return redirect()->route('barangmasuk')->with('success', 'Barang masuk berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->route('barangmasuk')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function updateBeritaAcara(Request $request, $kode)
    {

        // dd($request);
        try {
            $request->validate([
                'pemeriksaan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'serah_terima' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Cari data yang akan diupdate
            $beritaAcara = BarangMasuk::findOrFail($kode);

            // Simpan gambar baru jika ada, gunakan gambar lama jika tidak ada perubahan
            if ($request->hasFile('pemeriksaan')) {
                $beritaAcara->pemeriksaan = ImageHelper::handleImage($request->file('pemeriksaan'));
            }

            if ($request->hasFile('serah_terima')) {
                $beritaAcara->serah_terima = ImageHelper::handleImage($request->file('serah_terima'));
            }

            // Simpan perubahan ke database
            $beritaAcara->save();

            return redirect()->route('barangmasuk')->with('success', 'Berita Acara berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('barangmasuk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    /**
     * Display the specified resource.
     */
    public function show() {}

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
        $items = Item::all();
        $barangmasuk = BarangMasuk::where('kode', $kode)->with('supplier')->where('kode', $kode)->first();
        $detailBM = DetailBarangMasuk::where('kode_barang_masuk', $kode)
            ->with('item')
            ->get();

        return view('operator.edit-barang-masuk', compact('supplier', 'items', 'barangmasuk', 'detailBM'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
{
    try {
        $detailBM = DetailBarangMasuk::where('kode_barang_masuk', $kode)->get();

        for ($i = 0; $i < count($detailBM); $i++) {
            $item = Item::where('kode', $detailBM[$i]->kode_item)->first();
            $kuantiti = $request->input('kuantiti.' . $i);

            if ($item) {
                if ($detailBM[$i]->kuantiti > $kuantiti) {
                    $item->update([
                        'stok' => $item->stok - abs($detailBM[$i]->kuantiti - $kuantiti),
                    ]);
                } elseif ($detailBM[$i]->kuantiti < $kuantiti) {
                    $item->update([
                        'stok' => $item->stok + abs($detailBM[$i]->kuantiti - $kuantiti),
                    ]);
                } else {
                    $item->update([
                        'stok' => $item->stok,
                    ]);
                }
                $detailBM[$i]->update([
                    'kuantiti' => $kuantiti,
                ]);
            }
        }

        return redirect()->route('barangmasuk')->with('success', 'Barang berhasil diperbarui.');
    } catch (\Throwable $th) {
        return redirect()->route('barangmasuk')->with('error', $th->getMessage());
    }
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
    public function destroy(string $kode)
    {
        //
    }
}
