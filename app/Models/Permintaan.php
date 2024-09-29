<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permintaan extends Model
{
    use HasFactory;
    public $table = "permintaan";

    protected $guarded = ['id'];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    public function detailpermintaan():HasOne
    {
        return $this->hasOne(DetailPermintaan::class);
    }

}
