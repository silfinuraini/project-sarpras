<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPermintaan extends Model
{
    use HasFactory;
    public $table = "detail_permintaan";
    protected $guarded = ['id'];

    
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'kode_item');
    }

    public function permintaan(): BelongsTo
    {
        return $this->belongsTo(Permintaan::class, 'kode_permintaan');
    }
}
