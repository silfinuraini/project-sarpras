<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    public $table = "item";
    protected $primaryKey = 'kode';
    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'kode';
    }

    protected $fillable =
    [
        'kode',
        'nama',
        'merk',
        'satuan',
        'gambar',
        'harga',
        'stok',
        'stok_minimum',
        'kategori_id', 
        'deskripsi' 
        
    ];

    public function detailbarangmasuk(): HasMany
    {
        return $this->HasMany(DetailBarangMasuk::class);
    }

}
