<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatBarangExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Kode',
            'Nama',
            'Jenis',
            'Warna',
            'Ukuran',
            'Merk',
            'Satuan',
            'Harga',
            'Stok',
            'Stok Minimum',
            'Kode Kategori',
            'Deskripsi',
            'Tanggal Dibuat',
        ];
    }

}
