<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPengadaan extends Model
{
    use HasFactory;
    public $table = "detail_pengadaan";
    protected $guarded = ['id'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'kode_item');
    }

    public function pengadaan(): HasMany
    {
        return $this->hasMany(Pengadaan::class, 'nip');
    }

}
