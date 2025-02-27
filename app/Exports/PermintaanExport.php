<?php

namespace App\Exports;

use App\Models\Permintaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PermintaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permintaan::with('pegawai')->get();
    }

    public function headings(): array
    {
        return [
            'Kode',
            'Unit',
            'Jumlah Item',
            'Perihal',
            'Sifat',
            'Status',
            'Tanggal',
        ];      
    }

    public function map($permintaan): array
    {
        return [
            $permintaan->kode,
            $permintaan->pegawai->nama,
            $permintaan->jumlah_item,
            $permintaan->perihal,
            $permintaan->sifat,
            $permintaan->status,
            $permintaan->created_at->format('d-m-Y'),
        ];
    }
    
}
