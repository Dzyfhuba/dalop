<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ContohController extends Controller
{
    function index(){

        // $produk = Produk::all();

        // return view('contoh',['produk'=>$produk]);
    }

    function save(Request $request){
        dd($request);

        Produk::create([
            'nama_produk'=>$request->nama_produk,
            'deskripsi'=>$request->deskripsi,
        ]);

        return redirect()->back();

    }
}
