<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
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

        return view('operator.pengadaan', compact('item', 'pengadaan', 'pegawai', 'user'));
    }

    public function detail() {}

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
            'status' => 'menunggu',
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
        $user = User::all();

        $pengadaan = Pengadaan::with('pegawai')
            ->where('kode', $kode)
            ->first();
 
        return view('operator.detailpengadaan', compact('detailPengadaan', 'pengadaan', 'pegawai', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode)
    {
        $pengadaan = Pengadaan::with('pegawai')->where('kode', $kode)->first();
        $detailPengadaan = DetailPengadaan::where('kode_pengadaan', $kode)->get();
        return view('operator.edit-pengadaan', compact('pengadaan', 'detailPengadaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
    {
        Pengadaan::where('kode', $kode)->update([
            'status' => $request->input('status'),
        ]);

        if ($request->input('status') === 'ditolak') {
            DetailPengadaan::where('kode_pengadaan', $kode)->update([
                'kuantiti_disetujui' => 0,
            ]);
        }

        return redirect()->route('operator.pengadaan');
    }

    public function updateKuantiti(Request $request, string $id)
    {
        DetailPengadaan::where('id', $id)->update([
            'kuantiti_disetujui' => $request->input('kuantiti_disetujui'),
        ]);


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
