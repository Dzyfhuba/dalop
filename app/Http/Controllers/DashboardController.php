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

        $produk_varian = DB::select("
        SELECT 	pr.nama_produk,
        dph.id_produk_varian, 
        pv.nama_produk_varian as nama_produk_varian,
        date_trunc('month', dph.date) as month, 
        SUM(dph.nilai_realisasi) as nilai_realisasi,
        SUM(dph.nilai_rencana) as nilai_rencana,
        AVG(dph.persentase) as avg_presentase
        FROM data_produk_harians dph, produk_varians pv, produks pr
        WHERE dph.id_produk_varian = pv.id 
        AND pv.id_produk = pr.id
        AND pr.id = '$produk_id'
        AND date_part('year', dph.date) = '$year'
            GROUP BY dph.id_produk_varian, pv.nama_produk_varian, pr.nama_produk, month   
        ");

        // dd($produk_varian);
        // exit();

        // $month
        $month = $request->bulan ?? 1;

        $prog_per_tahun = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan = ['realisasi' => 0, 'rencana' => 0];
        $prog_per_bulan_sd = ['realisasi' => 0, 'rencana' => 0];
        $nama_produk = '';

        foreach ($produk_varian as $pv) {
            $prog_per_tahun['realisasi'] += $pv->nilai_realisasi;
            $prog_per_tahun['rencana'] += $pv->nilai_rencana;

            // echo $pv->year . "<br>";
            // echo $pv->month . "<br>";
            // echo $pv->nilai_realisasi . "<br>";
            // echo $pv->nilai_rencana . "<br>";
            // echo $pv->id_produk_varians . "<br>";
            // echo $pv->nama_produk . "<br>";
            // echo $pv->nama_produk_harian . "<br>";
            // echo $pv->date . "<br>";
            // echo "<br>";

            $nama_produk = $pv->nama_produk;

            // var_dump($pv->month);
            $date = new DateTime($pv->month);

            if ((int)$date->format('m') <= $month) {
                // dd('aa');
                $prog_per_bulan_sd['realisasi'] += $pv->nilai_realisasi;
                $prog_per_bulan_sd['rencana'] += $pv->nilai_rencana;
            }
            if ((int)$date->format('m') == $month) {
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
        // exit();
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

        $tahun = $request->tahun ?? date("Y") - 1;
        $id_bahan_baku = $request->bahan_baku ?? $bahan_baku[0]->id;
        $s_bahan_baku = BahanBaku::find($id_bahan_baku);
        // dd($s_bahan_baku);
        $stok = DB::select("SELECT * FROM stok_bahan_baku_harians 
        WHERE id_bahan_baku = '1' 
            AND date_part('year', date) = '2021' 
        GROUP BY date, id
        ORDER BY date ASC");
        // $stok = StokBahanBakuHarian::where('id_bahan_baku','=',$id_bahan_baku)->whereYear('date','=',$tahun)->groupBy('date')->get();

        $data = ['date' => [], 'stok' => []];
        foreach ($stok as $stk) {
            $data['date'][] = $stk->date;
            $data['stok'][] = $stk->stok;
        }

        // dd($data);

        return view('dashboard.bahanbaku', compact('data', 'bahan_baku', 's_bahan_baku'));
    }
}
