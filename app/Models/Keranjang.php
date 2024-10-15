<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';
    
    protected $guarded = [''];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    public function item():BelongsTo
    {
        return $this->belongsTo(Item::class, 'kode_item');
    }

}
