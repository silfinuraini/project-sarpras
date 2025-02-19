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
use Illuminate\Support\Facades\DB;

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

        $permintaan = Permintaan::with('pegawai')
        ->whereIn('status', ['menunggu', 'ditolak', 'disetujui'])
        ->orderByRaw("FIELD(status, 'menunggu', 'disetujui', 'ditolak')")
        ->orderBy('created_at', 'desc')
        ->paginate(10); 

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
        $user = User::all();


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
    
        $detailPermintaans = DetailPermintaan::where('kode_permintaan', $kode)->get();
    
        $permintaan = Permintaan::where('kode', $kode)->first();
        
        $kodeBk = 'BK' . rand(1000, 9999);
    
        foreach ($detailPermintaans as $detailPermintaan) {
            $barangKeluar = BarangKeluar::where('kode_permintaan', $permintaan->kode)->first();
    
            if (!$barangKeluar) {
                $barangKeluar = BarangKeluar::create([
                    'kode' => $kodeBk,
                    'kode_permintaan' => $detailPermintaan->kode_permintaan,
                    'nip' => $permintaan->nip,
                    'perihal' => $permintaan->perihal,
                    'sifat' => $permintaan->sifat,
                    'status' => 'belum diambil',
                    'jumlah_item' => 0 // Start with 0, will be updated later
                ]);
            }
    
            $barangKeluarDetail = DetailBarangKeluar::create([
                'kode_barang_keluar' => $barangKeluar->kode,
                'kode_item' => $detailPermintaan->kode_item,
                'kuantiti' => $detailPermintaan->kuantiti_disetujui
            ]);
    
            // Update jumlah_item of BarangKeluar based on DetailBarangKeluar
            BarangKeluar::where('kode_permintaan', $permintaan->kode)
                ->update(['jumlah_item' => DB::raw('jumlah_item + ' . $barangKeluarDetail->kuantiti)]);
        }

        return redirect()->route('operator.permintaan');
    }
    
    public function updateKuantiti(Request $request, string $id)
    {
        $detailPermintaan = DetailPermintaan::where('id', $id)->first();

        $detailPermintaan->update([
            'kuantiti_disetujui' => $request->input('kuantiti_disetujui'),
        ]);

        $item = Item::where('kode', $detailPermintaan->kode_item)->first();
        if ($item == true) {
            $item->update([
                'stok' => $item->stok - $request->kuantiti_disetujui
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
