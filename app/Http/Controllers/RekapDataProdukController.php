<?php

namespace App\Http\Controllers;

use App\Models\DataProdukHarian;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapDataProdukController extends Controller
{
    private function get_by_ym($data)
    {

        $d = [];
    }
    public function index(Request $request)
    {

        $n = [];

        $y = 2021;
        $id_p = 10;
        //$produk = Produk::all();

        $data_produk_harian = DataProdukHarian::groupBy('produk_varian');
        dd($data_produk_harian);
        // foreach ($data_produk_harian as $ph) {a
        //     // dd($ph->produk_varian->produk);
        //     $nama = $ph->produk_varian->produk->nama_produk;
        //     if (isset($n[$nama][$ph->date]['nilai_rencana'])) {
        //         $n[$nama][$ph->date]['nilai_rencana'] += $ph->nilai_rencana;
        //         $n[$nama][$ph->date]['nilai_realisasi'] += $ph->nilai_realisasi;
        //     }else{
        //         $n[$nama][$ph->date]['nilai_rencana'] = $ph->nilai_rencana;
        //         $n[$nama][$ph->date]['nilai_realisasi'] = $ph->nilai_realisasi;
        //     }
        // }






        // foreach ($produk as $pd){
        //     foreach($pd->produk_varian as $pv){
        //         foreach($pv->data_produk_harian as $ph){

        //             if(isset($n[$pd->nama_produk][$ph->date]['nilai_rencana'])){
        //                 // dd($ph->nilai_rencana,$ph->id);
        //                 $n[$pd->nama_produk][$ph->date]['nilai_rencana']+= $ph->nilai_rencana;
        //                 $n[$pd->nama_produk][$ph->date]['nilai_realisasi']+= $ph->nilai_realisasi;

        //             }else{
        //                 $n[$pd->nama_produk][$ph->date]['nilai_rencana'] = $ph->nilai_rencana;
        //                 $n[$pd->nama_produk][$ph->date]['nilai_realisasi'] = $ph->nilai_realisasi;

        //             }

        //         }

        //         //dd($pv->data_produk_harian->groupBy('date'));
        //     }
        // }


        dd($n['Amoniak']);

        return view('rekap_data.index');
    }
}
