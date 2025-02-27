<?php

namespace App\Http\Controllers;

use App\Exports\PermintaanExport;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\DetailPermintaan;
use App\Models\Item;
use App\Models\Pegawai;
use App\Models\Permintaan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PermintaanController extends Controller
{

    public function index()
    {
        $item = Item::all();
        $pegawai = Pegawai::all();
        $user = User::with('pegawai')->get();

        $permintaan = Permintaan::with('pegawai')
        ->whereIn('status', ['menunggu', 'ditolak', 'disetujui'])
        ->orderByRaw("FIELD(status, 'menunggu', 'disetujui', 'ditolak')")
        ->orderBy('created_at', 'desc')
        ->get(); 

        return view('operator.permintaan', compact('item', 'permintaan', 'pegawai', 'user'));
    }

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

    public function edit(string $id)
    {
        //
    }

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
    
    public function updateKuantitiDisetujui(Request $request, string $id)
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


    public function export_excel() 
    {
        return Excel::download(new PermintaanExport, 'permintaan.xlsx');
    }

    public function export_pdf() 
    {
        $permintaan = Permintaan::with('pegawai')->get();
 
    	$pdf = Pdf::loadview('operator.pdf.permintaan',['permintaan'=>$permintaan]);
    	return $pdf->download('laporan_permintaan.pdf');
    }

}
