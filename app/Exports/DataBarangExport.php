<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataBarangExport implements FromCollection, WithHeadings, WithMapping  

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::with('kategori')->get(); 
    }

    /**
     * Menambahkan header pada file Excel
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

    /**
     * Menentukan data yang akan diexport
     */
    public function map($item): array
    {
        return [
            $item->kode,
            $item->nama,
            $item->jenis ?? '-', 
            $item->warna ?? '-',
            $item->ukuran ?? '-',
            $item->merk,
            $item->satuan,
            $item->harga,
            $item->stok,
            $item->stok_minimum,
            $item->kategori_id,
            $item->deskripsi,
            $item->created_at->format('d-m-Y'),
        ];
    }


}
