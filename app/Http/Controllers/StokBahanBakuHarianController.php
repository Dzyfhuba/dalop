<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\StokBahanBakuHarian;
use Illuminate\Http\Request;

class StokBahanBakuHarianController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->first_date) {
            $first_date = $request->first_date;
        } else {
            $first_date = StokBahanBakuHarian::orderBy('date', 'ASC')->limit(1)->first()->date;
        }
        if ($request->end_date) {
            $end_date = $request->end_date;
        } else {
            $end_date = StokBahanBakuHarian::orderBy('date', 'DESC')->limit(1)->first()->date;
        }


        // $stokbahanbakuharian = StokBahanBakuHarian::whereBetween('date', [$first_date, $end_date])->get();

        $bahan_baku = BahanBaku::all();

        $bb = [];
        foreach ($bahan_baku as $b) {
            foreach ($b->stok_harian()->whereBetween('date', [$first_date, $end_date])->get() as $sh) {
                if (isset($bb[$sh->date])) {
                    $bb[$sh->date][$b->id] = $sh->stok;
                } else {
                    $bb[$sh->date] = [$b->id => $sh->stok];
                }
                // dd($sh);
            }
        }
        // dd($bahan_baku);

        return view('stokbahanbakuharian.index', compact( 'bb', 'bahan_baku','first_date','end_date'));
    }
    public function create()
    {

        $bahan_baku = BahanBaku::all();


        return view('stokbahanbakuharian.create', compact('bahan_baku'));
    }

    public function store(Request $request, $date = null)
    {
        // dd($request);
        $tgl_now = $date ?? date('Y-m-d');
        $stokbahanbakuharian = StokBahanBakuHarian::where('date', '=', $tgl_now)->get();
        if ($stokbahanbakuharian->count() == 0) {
            foreach ($request->nilai as $i => $nil) {
                StokBahanBakuHarian::create([
                    'id_bahan_baku' => $i,
                    'date' => $tgl_now,
                    'stok' => $nil
                ]);
            }
        } else {
            foreach ($stokbahanbakuharian as $sbb) {
                $sbb->stok = $request->nilai[$sbb->bahan_baku->id];
                $sbb->save();
            }
        }

        return redirect()->route('stokbahanbakuharian');
    }

    public function edit($date)
    {

        $bahan_baku = BahanBaku::all();
        $tgl_now = $date;
        $stokbahanbakuharian = StokBahanBakuHarian::where('date', '=', $tgl_now)->get();
        $stok = [];
        foreach ($stokbahanbakuharian as $bb) {
            $stok[$bb->bahan_baku->id] = $bb->stok;
        }

        // dd($stok);

        return view('stokbahanbakuharian.create', compact('bahan_baku','stok'));
    }

    public function delete($date){
        $tgl_now = $date;
        $stokbahanbakuharian = StokBahanBakuHarian::where('date', '=', $tgl_now)->get();
        foreach ($stokbahanbakuharian as $bb) {
            $bb->delete();
        }
        return redirect()->route('stokbahanbakuharian');
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
