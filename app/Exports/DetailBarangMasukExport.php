<?php

namespace App\Exports;

use App\Models\DetailBarangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetailBarangMasukExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $kode_barang_masuk;

    public function __construct($kode)
    {
        // dd($kode);
        $this->kode_barang_masuk = $kode;
    }
    
    public function collection()
    {
        return DetailBarangMasuk::where('kode_barang_masuk', $this->kode_barang_masuk)->with('item')->get();
    }

    public function headings(): array
    {
        return [
            'Kode Barang Masuk',
            'Kode Barang',
            'Nama Barang',
            'Stok Masuk',
            'Satuan',
        ];
    }

    public function map($detailBM): array
    {
        return [
            $detailBM->kode_barang_masuk,
            $detailBM->item->kode,
            $detailBM->item->nama,
            $detailBM->kuantiti,
            $detailBM->item->satuan,
        ];
    }
}
