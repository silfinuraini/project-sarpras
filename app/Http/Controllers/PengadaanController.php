<?php

namespace App\Http\Controllers;

use App\Models\DetailPengadaan;
use App\Models\Item;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use App\Models\User;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = Item::all();
        $pegawai = Pegawai::all(); 
        $user = User::with('pegawai')->get();
        $pengadaan = Pengadaan::withAggregate('pegawai', 'nama')->get();

        return view('operator.pengadaan', compact('item', 'pengadaan','pegawai', 'user'));
    }

    public function detail()
    {
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
        $kode = 'PGD' . rand(1000, 9999);

        $kodePengadaan = $request->input('item');
        $jumlah = count($kodePengadaan);
        
        $pengadaan = Pengadaan::create([
            'kode' => $kode,
            'nip' => $request->nip,
            'status' => 'Menunggu',
            'sifat' => $request->sifat,
            'perihal' => $request->perihal,
            'jumlah_item'  => $jumlah
        ]);

        for ($i = 0; $i < count($kodePengadaan); $i++) {
            $detailPengadaan = DetailPengadaan::create([
                'kode_pengadaan' => $pengadaan->kode,
                'kode_item' => $kodePengadaan[$i],
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
        $detailPengadaan = DetailPengadaan::with('item')->get();
        $pegawai = Pegawai::all();

        $pengadaan = Pengadaan::with( 'pegawai')
        ->where('kode', $kode)
        ->first();  

        // dd($detailPengadaan);die;
        return view('operator.detailpengadaan', compact('detailPengadaan', 'pengadaan', 'pegawai', 'item'));        
        // return view('operator.detailpengadaan', compact(''));        
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
        Pengadaan::where('kode', $kode)->update([
            'status' => $request->input('status'),
        ]);

        // $detailPengadaan = DetailPengadaan::where('kode', $kode)->first();
        // $detailPengadaan->update($request->all());


        return redirect()->route('operator.pengadaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}