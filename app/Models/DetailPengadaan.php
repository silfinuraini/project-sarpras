<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengadaan extends Model
{
    use HasFactory;
    public $table = "detail_pengadaan";
    protected $guarded = ['id'];


}
