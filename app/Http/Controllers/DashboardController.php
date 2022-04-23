<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\DataProdukHarian;
use App\Models\Produk;
use App\Models\ProdukVarian;
use App\Models\StokBahanBakuHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function produk(Request $request)
    {
        $produk = Produk::all();

        // $month = 1;
        $tahun_awal = explode("-", DataProdukHarian::orderBy('date', 'ASC')->limit(1)->first()->date)[0];
        $year = $request->tahun ?? $tahun_awal;

        // dd($year);
        $produk_id = $request->produk ?? $produk->first()->id;

        // dd($produk_id);
        // Iki pean gawe inputan kabeh mas
        if (isset($this->request)) {
            dd($this->request);
        }

        $data = [];

        $produk_varian = DataProdukHarian::whereYear('date', '=', $year)
            ->where('id_produk', '=', $produk_id)
            ->join('produk_varians', 'data_produk_harians.id_produk_varian', '=', 'produk_varians.id')
            ->join('produks', 'produk_varians.id_produk', '=', 'produks.id')
            ->select(DB::raw('YEAR(date) year, MONTH(date) month'), DB::raw('SUM(nilai_realisasi) as nilai_realisasi'), DB::raw('SUM(nilai_rencana) as nilai_rencana'), 'produk_varians.id as id_produk_varians', 'produks.nama_produk as nama_produk', 'produk_varians.nama_produk_varian as nama_produk_varian', 'date',)
            ->groupby('month')->groupBy('nama_produk_varian')
            ->get();

        // dd($produk_varian);

        $month = $request->bulan ?? 1;

        $prog_per_tahun = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan_sd = ['realisasi' => 0, 'rencana' => 0];

        $nama_produk = '';

        foreach ($produk_varian as $pv) {
            $prog_per_tahun['realisasi'] += $pv->nilai_realisasi;
            $prog_per_tahun['rencana'] += $pv->nilai_rencana;

            $nama_produk = $pv->nama_produk;

            if ((int)$pv->month <= $month) {
                // dd('aa');
                $prog_per_bulan_sd['realisasi'] += $pv->nilai_realisasi;
                $prog_per_bulan_sd['rencana'] += $pv->nilai_rencana;
            }
            if ((int)$pv->month == $month) {
                // dd('aa');
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
                        'backgroundColor' => 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')' ///$COLORS[$clri]
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
        // foreach()
        $datasets = [];
        foreach ($data as $dt) {
            // dd($dt);
            $dt['data'] = array_values($dt['data']);
            array_push($datasets, $dt);
        }

        $produk_varian_pertahun = $datasets;

        $ppb = 0;
        if ($prog_per_bulan['realisasi'] != 0 && $prog_per_bulan['rencana'] != 0) {
            $ppb = $prog_per_bulan['realisasi'] / $prog_per_bulan['rencana'] * 100;
        }

        $ppbs = 0;
        if ($prog_per_bulan['realisasi'] != 0 && $prog_per_bulan['rencana'] != 0) {
            $ppbs = $prog_per_bulan_sd['realisasi'] / $prog_per_bulan_sd['rencana'] * 100;
        }
        $ppt = 0;
        if ($prog_per_tahun['realisasi'] != 0 && $prog_per_tahun['rencana'] != 0) {
            $ppt = $prog_per_tahun['realisasi'] / $prog_per_tahun['rencana'] * 100;
        }



        // dd($produk_id,$prog_per_bulan,$prog_per_bulan_sd,$prog_per_tahun);


        return view('dashboard.produk', compact('produk_varian_pertahun', 'nama_produk', 'produk', 'tahun_awal', 'ppb', 'ppbs', 'ppt'));
    }
    public function bahanbaku(Request $request)
    {

        $bahan_baku = BahanBaku::all();

        $tahun = $request->tahun??date("Y")-1;
        $id_bahan_baku = $request->bahan_baku??$bahan_baku[0]->id;

        $stok = StokBahanBakuHarian::where('id_bahan_baku','=',$id_bahan_baku)->whereYear('date','=',$tahun)->groupBy('date')->get();
        $data = ['date'=>[],'stok'=>[]];
        foreach($stok as $stk){
            $data['date'][] = $stk->date;
            $data['stok'][] = $stk->stok;
        }
        
        // dd($data);

        return view('dashboard.bahanbaku',compact('data','bahan_baku'));
    }
}
