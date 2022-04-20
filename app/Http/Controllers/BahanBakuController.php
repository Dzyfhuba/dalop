<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index (){
        $bahan_baku = BahanBaku::all();
        // dd($bahan_baku);
        
        return view('bahan_baku.index',compact('bahan_baku'));
    }
    public function create(){

        return view('bahan_baku.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bahan_baku' => 'required',
            'liquid' => 'required',
            
        ]);  
        
        // dd($validated);
        BahanBaku::create($request->all());

        return redirect()->route('bahan_baku');
    }
    public function edit($id){
       $bahan_baku = BahanBaku::find($id);
    //    dd($bahan_baku);
        return view('bahan_baku.create',compact('bahan_baku'));
    }
    
    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama_bahan_baku' => 'required',
            'liquid' => 'required',
           
      
            
        ]);  
        // dd($request);
        $bahan_baku = BahanBaku::find($id);
        $bahan_baku ->fill($request->all());
        // dd($validated);
        $bahan_baku->save();

        return redirect()->route('bahan_baku');
    }
    public function delete($id)
    {
        $bahan_baku = BahanBaku::find($id);
        $bahan_baku->delete();

        return redirect()->route('bahan_baku');

    }

}
