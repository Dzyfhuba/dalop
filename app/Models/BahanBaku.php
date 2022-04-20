<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
   
    
    //iyoo ajane ga jenis_bahan_baku diisi liquid 
    // Yawes iku [ean gae jeneng sing enak pie. ]
    //oke mas suwun suwun ngko tak migrate neh
    //ape na kampus soale ijazah durung metu sier ws full wkkw
    //  Lo tenan ta mas? se tak ceke

    // Iki kebalikane, sing gaole diisi form.
    protected $guarded = ['id'];

    function stok_harian(){
        return $this->hasMany(StokBahanBakuHarian::class,'id_bahan_baku','id');
    }
 
}
