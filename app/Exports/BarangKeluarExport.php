<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangKeluar::with('pegawai')->get();
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Unit',
            'Jumlah Item',
            'Perihal',
            'Status',
            'Tanggal',
        ];
    }

    public function map($bk): array
    {
        return [
            $bk->kode,
            $bk->pegawai->nama,
            $bk->jumlah_item,
            $bk->perihal,
            $bk->status,
            $bk->created_at->format('d-m-Y'),
        ];
    }
}
