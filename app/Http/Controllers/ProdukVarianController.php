<?php

namespace App\Http\Controllers;

use App\Models\Pabrik;
use App\Models\Produk;
use App\Models\ProdukVarian;
use Illuminate\Http\Request;

class ProdukVarianController extends Controller
{
    public function index()
    {
        $produk_varian = ProdukVarian::all();
        // dd($data_pengguna);

        return view('produk_varian.index',compact('produk_varian'));
    }
    public function create()
    {

        $pabrik = Pabrik::all();
        // dd('auda');
        $produk = Produk::all();


        return view('produk_varian.create',compact('pabrik','produk'));
    
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk_varian' => 'required',
            
            'id_pabrik' => 'required',
            'id_produk' => 'required',

        ]);  
        ProdukVarian::create($validated);

        return redirect()->route('produkvarian');
    }
    public function edit($id)
    {
        $produk_varian = ProdukVarian::find($id);
        $produk = Produk::all();
        $pabrik = Pabrik::all();
        return view('produk_varian.create',compact('produk_varian','produk','pabrik'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk_varian' => 'required',
            'id_pabrik' => 'required',
            'id_produk' => 'required',
            
        ]);  
        $produk_varian = ProdukVarian::find($id);
        $produk_varian ->fill($validated);

        $produk_varian->save();

        return redirect()->route('produkvarian');
    }

    public function delete(Request $request,$id)
    {
        
        $produk_varian = ProdukVarian::find($id);
        // dd($produk_varian);
        $produk_varian->delete();

        return redirect()->route('produkvarian');

    }

}
