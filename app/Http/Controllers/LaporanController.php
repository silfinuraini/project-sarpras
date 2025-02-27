<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\DetailBarangKeluar;
use App\Models\DetailBarangMasuk;
use App\Models\Item;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {

        $data = Item::select(
            'item.kode',
            'item.nama',
            'item.gambar',
            'item.stok',
            'item.satuan',
            'kategori.nama as kategori',
            DB::raw('COALESCE(SUM(detail_barang_masuk.kuantiti), 0) as total_barang_masuk'),
            DB::raw('COALESCE(SUM(detail_barang_keluar.kuantiti), 0) as total_barang_keluar')
        )
            ->leftJoin('kategori', 'kategori.id', '=', 'item.kategori_id')
            ->leftJoin('detail_barang_masuk', 'item.kode', '=', 'detail_barang_masuk.kode_item')
            ->leftJoin('detail_barang_keluar', 'item.kode', '=', 'detail_barang_keluar.kode_item')
            ->groupBy('item.kode', 'item.nama', 'kategori.nama')
            ->get();


        $kategori = Kategori::all();

        $selectedCategory = $request->input('category_id');

        $items = Item::with('kategori')
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                $query->where('kategori_id', $selectedCategory);
            })
            ->orderByRaw('stok <= stok_minimum DESC')
            ->orderBy('nama', 'ASC')
            ->paginate(5);

        $items->appends(request()->query());

        if ($request->ajax()) {
            return response()->json([
                'items' => $items
            ]);
        }

        return view('operator.laporan', compact('data', 'kategori', 'selectedCategory'));
    }

    public function detailLaporan(string $kode)
    {
        $item = Item::with('kategori')->where('kode', $kode)->first();
        
        $incomingQuery = DetailBarangMasuk::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('SUM(kuantiti) as incoming_qty'),
            DB::raw('0 as outgoing_qty')
        )
        ->where('kode_item', $kode)
        ->groupBy(DB::raw('DATE(created_at)'));
        
        $outgoingQuery = DetailBarangKeluar::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('0 as incoming_qty'),
            DB::raw('SUM(kuantiti) as outgoing_qty')
        )
        ->where('kode_item', $kode)
        ->groupBy(DB::raw('DATE(created_at)'));
        
        $transactionsByDate = $incomingQuery->unionAll($outgoingQuery);
        
        $data = DB::query()
            ->fromSub($transactionsByDate, 'combined_transactions')
            ->select(
                'tanggal',
                DB::raw('SUM(incoming_qty) as barang_masuk'),
                DB::raw('SUM(outgoing_qty) as barang_keluar'),
                DB::raw('SUM(SUM(incoming_qty) - SUM(outgoing_qty)) OVER (ORDER BY tanggal ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) as total_barang')
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();
        
        $data->each(function($row) use ($item) {
            $row->satuan = $item->satuan;
        });
        
        return view('operator.detail-laporan', compact('data', 'item'));
    }

    public function export_excel()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }

    public function export_pdf()
    {
        $data = Item::select(
            'item.kode',
            'item.nama',
            'item.stok',
            'item.satuan',
            'kategori.nama as kategori',
            DB::raw('COALESCE(SUM(detail_barang_masuk.kuantiti), 0) as total_barang_masuk'),
            DB::raw('COALESCE(SUM(detail_barang_keluar.kuantiti), 0) as total_barang_keluar')
        )
            ->leftJoin('kategori', 'kategori.id', '=', 'item.kategori_id')
            ->leftJoin('detail_barang_masuk', 'item.kode', '=', 'detail_barang_masuk.kode_item')
            ->leftJoin('detail_barang_keluar', 'item.kode', '=', 'detail_barang_keluar.kode_item')
            ->groupBy('item.kode', 'item.nama', 'kategori.nama')
            ->get();

        $pdf = Pdf::loadview('operator.pdf.laporan', ['data' => $data]);
        return $pdf->download('laporan.pdf');
    }
}
