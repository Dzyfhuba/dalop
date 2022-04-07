<?php

namespace App\Http\Controllers;

use App\Models\DataProdukHarian;
use App\Models\Produk;
use App\Models\ProdukVarian;
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
        // dd($request->all());
        // dd('ad');
        //SELECT SUM(nilai_realisasi),EXTRACT(MONTH FROM "2021-01-01") FROM data_produk_harians as a INNER JOIN produk_varians as b ON a.id_produk_varian=b.id INNER JOIN produks as c ON b.id_produk = c.id WHERE c.id = 1 AND b.id = 2;
        if($request->has('tgl_awal')){
            $produk = DataProdukHarian::select('nama_produk','nama_produk_varian','date','nilai_realisasi','nilai_rencana','persentase')
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->where('id_produk',$request->id_produk)
            ->where('id_produk_varian',$request->id_produk_varian)
            ->whereBetween('date', [$request->tgl_awal, $request->tgl_akhir])
            ->get();
        }
        else{
            $produk = DB::table("data_produk_harians")->select('nama_produk','nama_produk_varian','date','nilai_realisasi','nilai_rencana','persentase')
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->where('id_produk_varian',1)
            ->get();

        }

       
           $a = Produk::select('id','nama_produk')->get();
           $b = ProdukVarian::select('id','nama_produk_varian')->get();

        return view('rekap_data.index',compact('a','b'),[
            'produk' => $produk,
        ]);

    }
}
