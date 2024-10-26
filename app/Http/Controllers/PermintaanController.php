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
        // Update status of Permintaan
        Permintaan::where('kode', $kode)->update([
            'status' => $request->input('status'),
        ]);
    
        // If status is 'ditolak', update the 'kuantiti_disetujui' in DetailPermintaan
        if ($request->input('status') === 'ditolak') {
            DetailPermintaan::where('kode_permintaan', $kode)->update([
                'kuantiti_disetujui' => 0,
            ]);
        }
    
        // Get all detail permintaan records based on kode_permintaan
        $detailPermintaans = DetailPermintaan::where('kode_permintaan', $kode)->get();
    
        // Get the related permintaan record
        $permintaan = Permintaan::where('kode', $kode)->first();
        
        // Generate kode for BarangKeluar
        $kodeBk = 'BK' . rand(1000, 9999);
    
        foreach ($detailPermintaans as $detailPermintaan) {
            // Find if BarangKeluar already exists
            $barangKeluar = BarangKeluar::where('kode_permintaan', $permintaan->kode)->first();
    
            // If it doesn't exist, create it
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
    
            // Create or update the related DetailBarangKeluar entry
            $barangKeluarDetail = DetailBarangKeluar::create([
                'kode_barang_keluar' => $barangKeluar->kode,
                'kode_item' => $detailPermintaan->kode_item,
                'kuantiti' => $detailPermintaan->kuantiti_disetujui
            ]);
    
            // Update jumlah_item of BarangKeluar based on DetailBarangKeluar
            BarangKeluar::where('kode_permintaan', $permintaan->kode)
                ->update(['jumlah_item' => DB::raw('jumlah_item + ' . $barangKeluarDetail->kuantiti)]);
        }

        return redirect()->back();
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
