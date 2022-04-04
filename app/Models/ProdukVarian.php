<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukVarian extends Model
{
    protected $fillable = [
        'nama_produk_varian' ,
        'deskripsi',
        'id_pabrik',
        'id_produk',
        
    ];

    use HasFactory;

    function pabrik(){
        return $this->belongsTo(Pabrik::class,'id_pabrik','id');
    }
    function produk(){
        return $this->belongsTo(Produk::class,'id_produk','id');
    }
    function data_produk_harian(){
        return $this->hasMany(DataProdukHarian::class,'id_produk_varian','id');
    }
}
