<?php

namespace App\Http\Controllers;

use App\Exports\PengadaanExport;
use App\Models\BarangKeluar;
use App\Models\DetailPengadaan;
use App\Models\Item;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengadaanController extends Controller
{
    public function index()
    {
        $item = Item::all();
        $pegawai = Pegawai::all();
        $user = User::with('pegawai')->get();

        $pengadaan = Pengadaan::with('pegawai')
            ->whereIn('status', ['menunggu', 'ditolak', 'disetujui'])
            ->orderByRaw("FIELD(status, 'menunggu', 'disetujui', 'ditolak')")
            ->orderBy('created_at', 'desc')
            ->get();

            // dd($pengadaan);
        return view('operator.pengadaan', compact('item', 'pengadaan', 'pegawai', 'user'));
    }

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

    public function edit(string $kode)
    {
        $pengadaan = Pengadaan::with('pegawai')->where('kode', $kode)->first();
        $detailPengadaan = DetailPengadaan::where('kode_pengadaan', $kode)->get();
        return view('operator.edit-pengadaan', compact('pengadaan', 'detailPengadaan'));
    }

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

    public function updateKuantiti(Request $request, string $kode)
    {
        $pengadaan = DetailPengadaan::where('kode_pengadaan', $kode)->get();
        // dd($pengadaan[0]);
        for ($i = 0; $i < count($pengadaan); $i++) {
            $detailPengadaan = DetailPengadaan::where('id', $pengadaan[$i]->id)->first();

            if ($detailPengadaan) {
                $detailPengadaan->update([
                    'kuantiti' => $request->kuantiti[$i]
                ]);
            }
        }

        return redirect()->route('operator.pengadaan')->with('success', 'Kuantiti berhasil diperbarui!');
    }


    public function updateKuantitiDisetujui(Request $request, string $id)
    {
        DetailPengadaan::where('id', $id)->update([
            'kuantiti_disetujui' => $request->input('kuantiti_disetujui'),
        ]);


        return redirect()->back();
    }

    public function export_excel()
    {
        return Excel::download(new PengadaanExport, 'pengadaan.xlsx');
    }

    public function export_pdf()
    {
        $pengadaan = Pengadaan::with('pegawai')->get();
 
    	$pdf = Pdf::loadview('operator.pdf.pengadaan',['pengadaan'=>$pengadaan]);
    	return $pdf->download('laporan_pengadaan.pdf');
    }
}
