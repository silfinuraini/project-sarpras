<?php

namespace App\Imports;

use App\Helpers\ImageHelper;
use App\Models\Item;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;

class DataBarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kategori = Kategori::find($row[10]); 

        $namaKode = $kategori ? $kategori->alias : 'UNK';
        $randomNumber = rand(1000, 9999);
        $code = $namaKode . $randomNumber;


        return new Item([
            'kode' => $code,               
            'nama' => $row[1] ?? null,    
            'jenis' => $row[2] ?? '-',    
            'warna' => $row[3] ?? '-',    
            'ukuran' => $row[4] ?? '-',   
            'merk' => $row[5] ?? null,    
            'satuan' => $row[6] ?? null,  
            'harga' => $row[7] ?? null,   
            'stok' => $row[8] ?? null,    
            'stok_minimum' => $row[9] ?? null, 
            'kategori_id' => $row[10] ?? null,  
            'deskripsi' => $row[11] ?? null,    
            'created_at' => now(),        
        ]);

    }
}
