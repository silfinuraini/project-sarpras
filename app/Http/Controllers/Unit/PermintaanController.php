<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\DetailPermintaan;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nip = Auth::user()->nip;

        $kategori = Kategori::all();
        $unit = Pegawai::where('nip', $nip)->get();
        // dd($unit);   
        $item = Item::all();

        return view('unit.permintaan', compact('kategori', 'unit', 'item'));
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
        try {
            $request->validate([
                'sifat' => 'required|string|min:3',
                'perihal' => 'required|string|min:3',
                'item' => 'required|array|min:1', 
                'kuantiti' => 'required|array|min:1',
            ]);
        
            $kode = 'PM' . rand(1000, 9999);
        
            $kodePermintaan = $request->input('item');
            $jumlah = count($kodePermintaan);
        
            $permintaan = Permintaan::create([
                'kode' => $kode,
                'nip' => Auth::user()->nip,
                'status' => 'menunggu',
                'sifat' => $request->sifat,
                'perihal' => $request->perihal,
                'jumlah_item'  => $jumlah
            ]);
        
            for ($i = 0; $i < count($kodePermintaan); $i++) {
                DetailPermintaan::create([
                    'kode_permintaan' => $permintaan->kode,
                    'kode_item' => $kodePermintaan[$i],
                    'kuantiti' => $request->kuantiti[$i],
                    'kuantiti_disetujui' => 0
                ]);
            }
        
            return redirect()->route('dashboard.unit')->with('success', 'Permintaan berhasil dibuat.');
        
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.unit')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        $kategori = Kategori::all();
        $permintaan = Permintaan::with('pegawai')->where('kode', $kode)->first();
        // dd($permintaan);
        $detailPermintaan = DetailPermintaan::where('kode_permintaan', $kode)->with('item.kategori')->get();

        return view('unit.detail-permintaan', compact('permintaan', 'detailPermintaan', 'kategori'));
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
