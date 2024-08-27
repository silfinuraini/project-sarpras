<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;
    public $table = "supplier";
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
        'alamat',
    ];


    public function barangmasuk(): HasOne 
    {
        return $this->hasOne(BarangMasuk::class);
    } 

}
