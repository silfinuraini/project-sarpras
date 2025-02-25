<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
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

        $data = DB::table(function ($query) use ($kode) {
            $query->select(
                    DB::raw('DATE(detail_barang_masuk.created_at) as tanggal'),
                    'item.satuan',
                    DB::raw('SUM(detail_barang_masuk.kuantiti) as barang_masuk'),
                    DB::raw('0 as barang_keluar')
                )
                ->from('detail_barang_masuk')
                ->join('item', 'item.kode', '=', 'detail_barang_masuk.kode_item')
                ->where('detail_barang_masuk.kode_item', $kode)
                ->groupBy(DB::raw('DATE(detail_barang_masuk.created_at)'), 'item.satuan')
                ->unionAll(
                    DB::table('detail_barang_keluar')
                    ->select(
                        DB::raw('DATE(detail_barang_keluar.created_at) as tanggal'),
                        'item.satuan',
                        DB::raw('0 as barang_masuk'),
                        DB::raw('SUM(detail_barang_keluar.kuantiti) as barang_keluar')
                    )
                    ->from('detail_barang_keluar')
                    ->join('item', 'item.kode', '=', 'detail_barang_keluar.kode_item')
                    ->where('detail_barang_keluar.kode_item', $kode)
                    ->groupBy(DB::raw('DATE(detail_barang_keluar.created_at)'), 'item.satuan')
                );
        }, 'transaksi')
        ->select(
            'transaksi.tanggal',
            'transaksi.satuan',
            DB::raw('SUM(transaksi.barang_masuk) as barang_masuk'),
            DB::raw('SUM(transaksi.barang_keluar) as barang_keluar'),
            DB::raw('SUM(SUM(transaksi.barang_masuk) - SUM(transaksi.barang_keluar)) 
                     OVER (ORDER BY transaksi.tanggal ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) as total_barang')
        )
        ->groupBy('transaksi.tanggal', 'transaksi.satuan')
        ->orderBy('transaksi.tanggal')
        ->get();
    
    
        return view('operator.detail-laporan', compact('data', 'item'));
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
        //
    }

    /**
     * Display the specified resource.
     */
   

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
