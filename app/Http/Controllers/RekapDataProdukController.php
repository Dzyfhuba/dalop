<?php

namespace App\Http\Controllers;

use App\Models\DataProdukHarian;
// use App\Models\Produk;
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
        

        $n = [];

        //$y = 2021;
        //$id_p = 10;
        //$produk = Produk::all();

        if ($request->tanggal_harian) {
            $date = $request->tanggal_harian;
        } else {
            $date = DataProdukHarian::orderBy('date', 'ASC')->limit(1)->first()->date;
        }



        if ($request->first_date) {
            $first_date = $request->first_date;
        } else {
            $first_date = DataProdukHarian::orderBy('date', 'ASC')->limit(1)->first()->date;
        }
        if ($request->end_date) {
            $end_date = $request->end_date;
        } else {
            $end_date = DataProdukHarian::orderBy('date', 'DESC')->limit(1)->first()->date;
        }




        $data_produk_harian = DataProdukHarian::where('date', '=', $date)
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->select(
                'data_produk_harians.id as id',
                'produks.nama_produk as produk',
                'date',
                DB::raw('SUM(data_produk_harians.nilai_rencana) as nilai_rencana'),
                DB::raw('SUM(data_produk_harians.nilai_realisasi) as nilai_realisasi')
            )
            ->groupBy('produk')
            ->get();


        $data_produk_bulanan = DataProdukHarian::whereBetween('date', [$first_date, $end_date])
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->select(
                'data_produk_harians.id as id',
                'produks.nama_produk as produk',
                'date',
                DB::raw('SUM(data_produk_harians.nilai_rencana) as nilai_rencana'),
                DB::raw('SUM(data_produk_harians.nilai_realisasi) as nilai_realisasi')
            )
            ->groupBy('produk')
            ->get();

        // dd($data_produk_bulanan);

        return view('rekap_data.index', compact('data_produk_harian', 'date','data_produk_bulanan','first_date','end_date'));
    }
}