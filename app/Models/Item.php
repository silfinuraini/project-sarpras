<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $table = "item";

    protected $fillable =
    [
        'nama',
        'kode',
        'merek',
        'satuan',
        'harga',
        'stok',
        'stok_minimum',
        'kategori_id',  
        
    ];

}
