<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapBahanBakuController extends Controller
{
    //
    public function index(Request $request){
        // $stokbahanbakuharian = StokBahanBakuHarian::
        return view('rekap_bahan_baku.index');
    }
    
}
