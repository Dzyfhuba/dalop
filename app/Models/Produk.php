<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk',
        'deskripsi'
        
    ];

    public function produk_varian(){
        return $this->hasMany(ProdukVarian::class,'id_produk','id');
    }
}
