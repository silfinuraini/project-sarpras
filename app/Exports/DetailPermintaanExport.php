<?php

namespace App\Exports;

use App\Models\DetailPermintaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetailPermintaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $kode_permintaan;

    public function __construct($kode)
    {
        $this->kode_permintaan = $kode;
    }

    public function collection()
    {
        return DetailPermintaan::where('kode_permintaan', $this->kode_permintaan)->with('item')->get();
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Barang',
            'Jumlah',
            'Jumlah Disetujui',
            'Satuan',
        ];
    }

    public function map($detailPermintaan): array
    {
        return [
            $detailPermintaan->item_kode,
            $detailPermintaan->item_nama,
            $detailPermintaan->kuantiti,
            $detailPermintaan->kuantiti_disetujui,
            $detailPermintaan->item_satuan,
        ];
    }
    
}
