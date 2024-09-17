<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    
    protected $fillable = ['user_id', 'kode_item', 'kuantitas'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

}
