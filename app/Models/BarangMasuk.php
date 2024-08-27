<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BarangMasuk extends Model
{
    use HasFactory;
    public $table = "barang_masuk";
    
    protected $guarded = [];
    protected $primaryKey = 'kode';

    protected $keyType = 'string';    
    public $incrementing = false;

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip');
    }

    public function detailBM(): HasMany
    {
        return $this->hasMany(DetailBarangMasuk::class);
    }
}
