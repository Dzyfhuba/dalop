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
            ->select('produk_varians.id_produk as id_produk', 'produk_varians.nama_produk_varian as nama_produk_varian', 'date')
            ->get();

        // dd($produk_varian);
        // foreach()



        return view('dashboard.produk');
    }
}
