<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBarangKeluar extends Model
{
    use HasFactory;
    public $table = "detail_barang_keluar";

    protected $guarded = ['id'];

    public function barangkeluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluar::class, 'kode_barang_keluar');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'kode_item');
    }
}
