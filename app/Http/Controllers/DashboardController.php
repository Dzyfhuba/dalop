<?php

namespace App\Http\Controllers;

use App\Models\DataProdukHarian;
use App\Models\ProdukVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function produk()
    {


        $month = 1;
        $year = 2021;
        $produk_id = 1;


        $data = [];

        $produk_varian = DataProdukHarian::whereYear('date', '=', $year)
            ->where('id_produk', '=', $produk_id)
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->select(DB::raw('YEAR(date) year, MONTH(date) month'), DB::raw('SUM(nilai_realisasi) as nilai_realisasi'), DB::raw('SUM(nilai_rencana) as nilai_rencana'), 'produk_varians.id as id_produk_varians', 'produk_varians.nama_produk_varian as nama_produk_varian', 'date',)
            ->groupby('month')->groupBy('nama_produk_varian')
            ->get();

        // dd($produk_varian);
        $COLORS = [
            '#4dc9f6',
            '#f67019',
            '#f53794',
            '#537bc4',
            '#acc236',
            '#166a8f',
            '#00a950',
            '#58595b',
            '#8549ba'
        ];

        foreach ($produk_varian as $pv) {
            if (isset($data[$pv->nama_produk_varian . "-nilai_rencana"])) {
                $data[$pv->nama_produk_varian . "-nilai_rencana"]['data'][$pv->month] = $pv->nilai_rencana;
            } else {
                $clri = array_rand($COLORS);
                $data[$pv->nama_produk_varian . "-nilai_rencana"] =
                    [
                        'label' => $pv->nama_produk_varian . " Rencana",
                        'data' => [$pv->month => $pv->nilai_rencana],
                        'stack' => "nilai_rencana",
                        'backgroundColor' => $COLORS[$clri]
                    ];
                unset($COLORS[$clri]);
            }
            if (isset($data[$pv->nama_produk_varian . "-nilai_realisasi"])) {
                $data[$pv->nama_produk_varian . "-nilai_realisasi"]['data'][$pv->month] = $pv->nilai_realisasi;
            } else {
                $clri = array_rand($COLORS);
                $data[$pv->nama_produk_varian . "-nilai_realisasi"] =
                    [
                        'label' => $pv->nama_produk_varian . " Realisasi",
                        'data' => [$pv->month => $pv->nilai_realisasi],
                        'stack' => "nilai_realisasi",
                        'backgroundColor' => $COLORS[$clri]
                    ];
                unset($COLORS[$clri]);
            }
        }
        // foreach()
        $datasets = [];
        foreach ($data as $dt) {
            // dd($dt);
            $dt['data'] = array_values($dt['data']);
            array_push($datasets, $dt);
        }
        $produk_varian_pertahun = $datasets;

        // dd($produk_varian_pertahun);



        return view('dashboard.produk', compact('produk_varian_pertahun'));
    }
}
