<?php

namespace App\Exports;

use App\Models\Pengadaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PengadaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengadaan::with('pegawai')->get();
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

    public function map($pengadaan): array
    {
        return [
            $pengadaan->kode,
            $pengadaan->pegawai->nama,
            $pengadaan->jumlah_item,
            $pengadaan->perihal,
            $pengadaan->sifat,
            $pengadaan->status,
            $pengadaan->created_at->format('d-m-Y'),
        ];
    }
}
