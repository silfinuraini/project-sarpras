<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangMasuk extends Model
{
    use HasFactory;
    public $table = "detail_barang_masuk";
    protected $guarded = ['id'];


    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'kode_item');
    }

    public function barangMasuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasuk::class,'kode_barang_masuk');
    }

    protected $fillable = [
        'kode_barang_masuk',
        'kode_item',
        'kuantiti'
    ];

}
