<?php

namespace App\Exports;

use App\Models\DetailBarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetailBarangKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $kode_barang_keluar;

    public function __construct($kode)
    {
        // dd($kode);
        $this->kode_barang_keluar = $kode;
    }
    
    public function collection()
    {
        return DetailBarangKeluar::where('kode_barang_keluar', $this->kode_barang_keluar)->with('item')->get();
    }

    public function headings(): array
    {
        return [
            'Kode ',
            'Barang',
            'Kuantiti',
            'Satuan',
        ];
    }

    public function map($detailBK): array
    {
        // dd($detailBK->item->kode);
        return [
            $detailBK->item->kode,
            $detailBK->item->nama,
            $detailBK->kuantiti,
            $detailBK->item->satuan,
        ];
    }
}

