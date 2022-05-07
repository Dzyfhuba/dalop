<?php

namespace App\Http\Controllers;

use App\Models\StokBahanBakuHarian;
use Illuminate\Http\Request;

class RekapBahanBakuController extends Controller
{
    //
    public function index(Request $request){
        // $stokbahanbakuharian = StokBahanBakuHarian::
        $date = $request->date ?? date('y-m-d');

        $stock = StokBahanBakuHarian::where('date','=',$date)->get();
        // dd($stock[0]->bahan_baku);
        return view('rekap_bahan_baku.index',compact('stock','date'));
    }
    
}
