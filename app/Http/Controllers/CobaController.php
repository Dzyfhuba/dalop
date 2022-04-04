<?php

namespace App\Http\Controllers;

use App\Models\Pabrik;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    function index(){

        $pabrik = Pabrik::all();

        return view('coba',['pabrik'=>$pabrik]);
    }

    function save(Request $request){
        // dd($request);

        Pabrik::create([
            'nama_pabrik'=>$request->nama_pabrik,
            
        ]);

        return redirect()->back();

    }
}
