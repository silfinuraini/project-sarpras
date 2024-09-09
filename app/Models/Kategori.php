<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kategori extends Model
{
    use HasFactory;
    public $table = "kategori";

    protected $guarded = ['id'];
    
    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }

}
