<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdukHarian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function produk_varian(){
        return $this->belongsTo(ProdukVarian::class,'id_produk_varian','id');
    }
}
