<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\DetailPermintaan;
use App\Models\Item;
use App\Models\Pegawai;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::all();
        $pegawai = Pegawai::all();
        $user = User::with('pegawai')->get();

        $menunggu = Permintaan::with('pegawai')
            ->where('status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        $others = Permintaan::with('pegawai')
            ->whereIn('status', ['ditolak', 'disetujui'])
            ->orderBy('created_at', 'desc')
            ->get();

        $permintaan = $menunggu->concat($others);

        return view('operator.permintaan', compact('item', 'permintaan', 'pegawai', 'user'));
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
        $kode = 'PM' . rand(1000, 9999);

        $kodePermintaan = $request->input('item');
        $jumlah = count($kodePermintaan);

        $permintaan = Permintaan::create([
            'kode' => $kode,
            'nip' => $request->nip,
            'status' => 'menunggu',
            'sifat' => $request->sifat,
            'perihal' => $request->perihal,
            'jumlah_item'  => $jumlah
        ]);

        for ($i = 0; $i < count($kodePermintaan); $i++) {
            $detailPermintaan = DetailPermintaan::create([
                'kode_permintaan' => $permintaan->kode,
                'kode_item' => $kodePermintaan[$i],
                'kuantiti' => $request->kuantiti[$i],
                'kuantiti_disetujui' => 0
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        $item = Item::all();
        $detailPermintaan = DetailPermintaan::with('item')->get();
        $pegawai = Pegawai::all();

        $permintaan = Permintaan::with('pegawai')
            ->where('kode', $kode)
            ->first();

        return view('operator.detail-permintaan', compact('detailPermintaan', 'permintaan', 'pegawai', 'item'));
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
    public function update(Request $request, string $kode)
    {
        Permintaan::where('kode', $kode)->update([
            'status' => $request->input('status'),
        ]);


        if ($request->input('status') === 'ditolak') {
            DetailPermintaan::where('kode_permintaan', $kode)->update([
                'kuantiti_disetujui' => 0,
            ]);
        }

        $permintaan = Permintaan::where('kode', $kode)->first();
        $kodebk = 'BK' . rand(1000, 9999);

        $jumlahitem = Permintaan::select("jumlah_item")->where('kode', $kode)->get();

        // $barangkeluar = BarangKeluar::create([
        //     'kode' => $kodebk,
        //     'nip' => $permintaan->nip,
        //     'perihal' => $permintaan->perihal,
        //     'sifat' => $permintaan->sifat,
        //     'status' => $permintaan->status,
        //     'jumlah_item' => 0,
        // ]);

        return redirect()->route('operator.permintaan');
    }

    public function updateKuantiti(Request $request, string $id)
    {
        $detailPermintaan = DetailPermintaan::where('id', $id)->first();

        $detailPermintaan->update([
            'kuantiti_disetujui' => $request->input('kuantiti_disetujui'),
        ]);

        $item = Item::where('kode', $detailPermintaan->kode_item)->first();
        // dd($item);
        if ($item == true) {
            $item->update([
                'stok' => $item->stok - $detailPermintaan->kuantiti
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
