<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'jenis',
        'warna',
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

    public function kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
