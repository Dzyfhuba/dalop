<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Produk;
use App\Models\BahanBaku;
use App\Models\ProdukVarian;
use Illuminate\Http\Request;
use App\Models\DataProdukHarian;
use Illuminate\Support\Facades\DB;
use App\Models\StokBahanBakuHarian;
use DateTimeZone;

class DashboardController extends Controller
{

    public function produk(Request $request)
    {
        $produk = Produk::all();


        $tahun_awal = explode("-", DataProdukHarian::orderBy('date', 'ASC')->limit(1)->first()->date)[0];
        $year = $request->tahun ?? $tahun_awal;

        $produk_id = $request->produk ?? $produk->first()->id;

        if (isset($this->request)) {
            dd($this->request);
        }

        $data = [];

        $produk_varian2 = DataProdukHarian::whereYear('date', '=', $year)->join('produk_varians', function ($join) {
            $join->on('data_produk_harians.id_produk_varian', '=', 'produk_varians.id');
        })->where('produk_varians.id_produk', '=', $produk_id)
            ->get();





        $_tdt = [];
        foreach ($produk_varian2 as $pv) {
            $month = explode('-', $pv->date)[1];
            $nm = $pv->produk_varian->nama_produk_varian;
            if (isset($_tdt[$month . '-' . $nm])) {
                $_tdt[$month . '-' . $nm]->nilai_realisasi += $pv->nilai_realisasi;
                $_tdt[$month . '-' . $nm]->nilai_rencana += $pv->nilai_rencana;
            } else {
                $_tdt[$month . '-' . $nm] = (object)['nilai_realisasi' => $pv->nilai_realisasi, 'nilai_rencana' => $pv->nilai_rencana, 'month' => $month, 'id_produk_varian' => $pv->id_produk_varians, 'date' => $pv->date, 'nama_produk' => $pv->produk_varian->produk->nama_produk, 'nama_produk_varian' => $pv->produk_varian->nama_produk_varian];
            }
            #echo "<br>";
        }


        $months = [];
        foreach ($produk_varian2 as $key => $p) {
            $month = explode('-', $p->date)[1];
            $months[] = $month;
        }


        $prog_per_tahun = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan_sd = ['realisasi' => 0, 'rencana' => 0];
        $nama_produk = '';

        $i = 0;
        foreach ($_tdt as $key => $pv) {
            $i++;
            $prog_per_tahun['realisasi'] += $pv->nilai_realisasi;
            $prog_per_tahun['rencana'] += $pv->nilai_rencana;


            $nama_produk = $pv->nama_produk;


            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Jakarta'));
            if ((int)$date->format('m') <= (int)$pv->month) {
                $prog_per_bulan_sd['realisasi'] += $pv->nilai_realisasi;
                $prog_per_bulan_sd['rencana'] += $pv->nilai_rencana;
            }
            if ((int)$date->format('m') == (int)$pv->month) {
                $prog_per_bulan['realisasi'] += $pv->nilai_realisasi;
                $prog_per_bulan['rencana'] += $pv->nilai_rencana;
            }
            if (isset($data[$pv->nama_produk_varian . "-nilai_rencana"])) {
                $data[$pv->nama_produk_varian . "-nilai_rencana"]['data'][$pv->month] = $pv->nilai_rencana;
            } else {

                $data[$pv->nama_produk_varian . "-nilai_rencana"] =
                    [
                        'label' => $pv->nama_produk_varian . " Rencana",
                        'data' => [$pv->month => $pv->nilai_rencana],
                        'stack' => "nilai_rencana",
                    ];
            }
            if (isset($data[$pv->nama_produk_varian . "-nilai_realisasi"])) {
                $data[$pv->nama_produk_varian . "-nilai_realisasi"]['data'][$pv->month] = $pv->nilai_realisasi;
            } else {

                $data[$pv->nama_produk_varian . "-nilai_realisasi"] =
                    [
                        'label' => $pv->nama_produk_varian . " Realisasi",
                        'data' => [$pv->month => $pv->nilai_realisasi],
                        'stack' => "nilai_realisasi",
                        'backgroundColor' => 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')'
                    ];
            }
        }
        $datasets = [];
        foreach ($data as $dt) {
            $dt['data'] = array_values($dt['data']);
            array_push($datasets, $dt);
        }

        $produk_varian_pertahun = $datasets;

        $ppb = 0;
        if ($prog_per_bulan['realisasi'] != 0 && $prog_per_bulan['rencana'] != 0) {
            $ppb = $prog_per_bulan['realisasi'] / $prog_per_bulan['rencana'] * 100 / 1;
          
        }

        $ppbs = 0;
        if ($prog_per_bulan['realisasi'] != 0 && $prog_per_bulan['rencana'] != 0) {
            $ppbs = $prog_per_bulan_sd['realisasi'] / $prog_per_bulan_sd['rencana'] * 100 / 1;
        }

        $ppt = 0;
        if ($prog_per_tahun['realisasi'] != 0 && $prog_per_tahun['rencana'] != 0) {
            $ppt = $prog_per_tahun['realisasi'] / $prog_per_tahun['rencana'] * 100 / 1;
        }






        return view('dashboard.produk', compact('produk_varian_pertahun', 'nama_produk', 'produk', 'tahun_awal', 'ppb', 'ppbs', 'ppt'));
    }
    public function bahanbaku(Request $request)
    {

        $bahan_baku = BahanBaku::all();

        $tahun = $request->tahun ?? date("Y") - 1;
        $id_bahan_baku = $request->bahan_baku ?? $bahan_baku[0]->id;
        $s_bahan_baku = BahanBaku::find($id_bahan_baku);



        $_stok = StokBahanBakuHarian::where('id_bahan_baku', '=', $id_bahan_baku)->get();

        $stok = [];
        foreach ($_stok as $st) {
            $dt_e = explode('-', $st->date);
            $dt_year = $dt_e[0];
            $dt_month = $dt_e[1];
            if ($dt_year == $tahun) {
                $stok[$st->date] = (object)['date' => $st->date, 'stok' => $st->stok];
            }
        }
        $data = ['date' => [], 'stok' => []];
        foreach ($stok as $stk) {

            $data['date'][] = $stk->date;
            $data['stok'][] = $stk->stok;
        }


        return view('dashboard.bahanbaku', compact('data', 'bahan_baku', 's_bahan_baku'));
    }
}
