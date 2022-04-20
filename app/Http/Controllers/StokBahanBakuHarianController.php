<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\StokBahanBakuHarian;
use Illuminate\Http\Request;

class StokBahanBakuHarianController extends Controller
{
    //
    public function index()
    {
        $stokbahanbakuharian = StokBahanBakuHarian::all();
        // dd($stokbahanbakuharian);

        return view('stokbahanbakuharian.index', compact('stokbahanbakuharian'));
    }
    public function create()
    {

        $bahan_baku = BahanBaku::all();


        return view('stokbahanbakuharian.create', compact('bahan_baku'));
    }
    // public function store(Request $request)
    // {
    //     foreach ($request->all() as $idx => $rq) {
    //         if ($rq == null) {
    //             $errors[$idx] = " input kosong ";
    //         }
    //     }
    //     if (!empty($errors)) {
    //         return redirect()->back()->with($errors)->withInput($request->input);
    //     } else {
    //         $bahan_baku = BahanBaku::all();
    //         foreach ($bahan_baku as $bb) {
    //             $stokharian = new StokBahanBakuHarian;
    //             DataProdukHarian::create([
    //                 'date' => date('Y-m-d'),
    //                 'id_bahan_baku' => $bb->id,
    //                 'nilai_realisasi' => $request[$pv->id . ":nilai_realisasi"],
    //                 'nilai_rencana' => $request[$pv->id . ":nilai_rencana"],
    //                 'persentase' => ($request[$pv->id . ":nilai_realisasi"] / $request[$pv->id . ":nilai_rencana"]) * 100
    //             ]);
    //         }
    //         return redirect()->route('dataprodukharian');
    //     }
    // }
}
