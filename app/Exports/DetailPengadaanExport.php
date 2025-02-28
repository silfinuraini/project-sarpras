<?php

namespace App\Exports;

use App\Models\DetailPengadaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetailPengadaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $kode_pengadaan;

    public function __construct($kode)
    {
        $this->kode_pengadaan = $kode;
    }

    public function collection()
    {
        return DetailPengadaan::where('kode_pengadaan', $this->kode_pengadaan)->with('item')->get();
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

    public function map($detailPengadaan): array
    {
        return [
            $detailPengadaan->item->kode,
            $detailPengadaan->item->nama,
            $detailPengadaan->kuantiti,
            $detailPengadaan->kuantiti_disetujui,
            $detailPengadaan->item->satuan,
        ];
    }
    
}
