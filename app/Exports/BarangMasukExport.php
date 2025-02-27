<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangMasukExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangMasuk::with('pegawai', 'supplier')->get();
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Pegawai',
            'Jumlah Item',
            'Supplier',
            'Tanggal Masuk',
        ];
    }

    public function map($bm): array
    {
        return [
            $bm->kode,
            $bm->pegawai->nama,
            $bm->jumlah_item,
            $bm->supplier->nama,
            $bm->created_at->format('d-m-Y'),
        ];
    }
}
