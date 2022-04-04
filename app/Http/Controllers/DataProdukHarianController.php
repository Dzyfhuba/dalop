<?php

namespace App\Http\Controllers;

use App\Models\DataProdukHarian;
use Illuminate\Http\Request;
use App\Models\ProdukVarian;
use Dflydev\DotAccessData\Data;

class DataProdukHarianController extends Controller
{
    //
    public function index(Request $request)
    {
        $produk_varian = ProdukVarian::all();
        $produk_harian = new DataProdukHarian;

        if ($request->id_produk_varian) {
            $produk_harian = $produk_harian->where('id_produk_varian', '=', $request->id_produk_varian);
        }
        if ($request->date) {
            $produk_harian = $produk_harian->where('date', '=', $request->date);
        }
        $produk_harian = $produk_harian->paginate(25);

        // dd($produk_harian);
        // dd($data_pengguna);
        return view('data_produk_harian.index', compact('produk_varian', 'produk_harian'));
    }
    public function create()
    {

        // $dataprodukharian = DataProdukHarian::all();
        // dd('auda');
        // $dataprodukharian = DataProdukHarian::all();

        $produkvarian = ProdukVarian::all();


        return view('data_produk_harian.create', compact('produkvarian'));
    }

    public function store(Request $request)
    {
        // dd(date('Y-m-d'));
        $errors = [];
        // dd($request);
        foreach ($request->all() as $idx => $rq) {
            if ($rq == null) {
                $errors[$idx] = " input kosong ";
            }
        }
        if (!empty($errors)) {
            return redirect()->back()->with($errors)->withInput($request->input);
        }else{
            $produkvarian = ProdukVarian::all();
            foreach ($produkvarian as $pv) {
                $dataharian = new DataProdukHarian;
                DataProdukHarian::create([
                    'date'=>date('Y-m-d'),
                    'id_produk_varian' => $pv->id,
                    'nilai_realisasi'=>$request[$pv->id.":nilai_realisasi"],
                    'nilai_rencana'=>$request[$pv->id.":nilai_rencana"],
                    'persentase'=>($request[$pv->id.":nilai_realisasi"]/$request[$pv->id.":nilai_rencana"])*100
                ]);

            }
            return redirect()->route('dataprodukharian');

        }

        
        // dd($errors);
    }
    public function edit($id)
    {
        $produk_harian = DataProdukHarian::find($id);
        // $produkvarian = ProdukVarian::all();
     
        return view('data_produk_harian.edit',compact('produk_harian'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            
            'nilai_realisasi' => 'required',
            'nilai_rencana' => 'required',
        
        
        ]);
        // dd($request);
        $produk_harian = DataProdukHarian::find($id);
        $produk_harian ->fill($validated);
        $produk_harian ->persentase = ($request['nilai_realisasi']/$request['nilai_rencana'])*100;
        $produk_harian->save();

        return redirect()->route('dataprodukharian');  
    }

    public function delete($id) {

        $produk_harian = DataProdukHarian::find($id);
        // dd($produk_varian);
        $produk_harian->delete();

        return redirect()->route('dataprodukharian'); 
    

    
    }
}
