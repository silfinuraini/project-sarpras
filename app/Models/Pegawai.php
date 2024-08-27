<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;

    public $table = "pegawai";

    // protected $guarded = ['nip'];
    protected $primaryKey = "nip";
    protected $keyType = "string";

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'nip');
    }

    protected $fillable =
    [
       'nip',
       'nama',
       'email' 
    ];
}
