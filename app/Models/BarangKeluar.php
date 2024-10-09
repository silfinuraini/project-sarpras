<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangKeluar extends Model
{
    use HasFactory;
    public $table = "barang_keluar";

    protected $guarded = ['id'];

    public function detailbarangkeluar(): HasMany
    {
        return $this->hasMany(DetailBarangKeluar::class);
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }
}
