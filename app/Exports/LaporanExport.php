<?php

namespace App\Exports;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::select(
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
        
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Nama',
            'Kategori',
            'Total Barang Masuk',
            'Total Barang Keluar',
            'Stok',
            'Satuan',
        ];
    }

    public function map($item): array
    {
        return [
            $item->kode,
            $item->nama,
            $item->kategori,
            $item->total_barang_masuk,    
            $item->total_barang_keluar,
            $item->stok,
            $item->satuan,
        ];
    }
}
