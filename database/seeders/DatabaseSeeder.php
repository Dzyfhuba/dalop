<?php

namespace Database\Seeders;

use App\Models\Pabrik;
use App\Models\BahanBaku;
use App\Models\Produk;
use App\Models\ProdukVarian;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        $p1a = Pabrik::create([
            "nama_pabrik" => 'Pabrik IA',

        ]);
        $p1b = Pabrik::create([
            "nama_pabrik" => 'Pabrik IB',

        ]);
        $p2a = Pabrik::create([
            "nama_pabrik" => 'Pabrik IIA',

        ]);
        $p2b = Pabrik::create([
            "nama_pabrik" => 'Pabrik IIB',

        ]);
        $p3a = Pabrik::create([
            "nama_pabrik" => 'Pabrik IIIA',

        ]);
        $p3b = Pabrik::create([
            "nama_pabrik" => 'Pabrik IIIB',

        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'NH3',
            "liquid" => 'liquid',
            "safety_stock" => 10000,
            "dead_stock" => 6000,
            "max" => 36500,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'SA',
            "liquid" => 'Liquid',
            "safety_stock" => 20000,
            "dead_stock" => 5000,
            "max" => 62000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'PA(Liquid + Sludge Actual)',
            "liquid" => 'Liquid',
            "safety_stock" => 22000,
            "dead_stock" => 6000,
            "max" => 58500,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'PA(Liqud Actual)',
            "liquid" => 'Liquid',
        ]);

        BahanBaku::create([
            "nama_bahan_baku" => 'PR II',
            "liquid" => 'Non Liquid',
            "safety_stock" => 20000,
            "dead_stock" => 10000,
            "max" => 50000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'PR IIIA',
            "liquid" => 'Non Liquid',
            "safety_stock" => 35000,
            "dead_stock" => 10000,
            "max" => 80000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'PR IIIB',
            "liquid" => 'Non Liquid',
            "safety_stock" => 35000,
            "dead_stock" => 10000,
            "max" => 45000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'KCL Merah',
            "liquid" => 'Non Liquid',
            "safety_stock" => 27000,
            "dead_stock" => 1000,
            "max" => 54000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'KCL Putih',
            "liquid" => 'Non liquid',
            "safety_stock" => 6000,
            "dead_stock" => 1000,
            "max" => 27000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'Sulfur',
            "liquid" => 'Non Liquid',
            "safety_stock" => 18000,
            "dead_stock" => 5000,
            "max" => 75000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'AL(OH)3',
            "liquid" => 'Non Liquid',
            "safety_stock" => 2000,
            "dead_stock" => 500,
            "max" => 4000,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'DAP',
            "liquid" => 'Non Liquid',
            "safety_stock" => 13000,
            "dead_stock" => 1000,
            "max" => 29750,
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'Urea',
            "liquid" => 'Non Liquid',
        ]);
        BahanBaku::create([
            "nama_bahan_baku" => 'ZA',
            "liquid" => 'liquid',
            "safety_stock" => 21000,
            "dead_stock" => 5000,
        ]);
        $amoniak = Produk::create([
            "nama_produk" => 'Amoniak',
        ]);
        $urea = Produk::create([
            "nama_produk" => 'Urea',
        ]);
        $za = Produk::create([
            "nama_produk" => 'ZA',
        ]);
        $np =  Produk::create([
            "nama_produk" => 'NPK & Phonska',
        ]);
        $sp36 = Produk::create([
            "nama_produk" => 'SP-36',
        ]);
        $sp26 = Produk::create([
            "nama_produk" => 'SP-26',
        ]);
        $zk = Produk::create([
            "nama_produk" => 'ZK',
        ]);
        $hcl = Produk::create([
            "nama_produk" => 'HCL',
        ]);
        $h2so4 = Produk::create([
            "nama_produk" => 'H2SO4',
        ]);
        $h3po4 = Produk::create([
            "nama_produk" => 'H3PO4',
        ]); 
        $aif3 = Produk::create([
            "nama_produk" => 'AIF3',
        ]); 
        ProdukVarian::create([
            "id_produk" => $amoniak->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'Amoniak I',
        ]);
        ProdukVarian::create([
            "id_produk" => $amoniak->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'Amoniak II',
        ]);
        ProdukVarian::create([
            "id_produk" => $urea->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'Urea I',
        ]);
        ProdukVarian::create([
            "id_produk" => $urea->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'Urea II',
        ]);
        ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'ZA I',
        ]);
        ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZA II',
        ]);
        ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'ZA III',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'Ph 15-10-12',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'NPS',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'Phonska Plus',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'DAP',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'NPK Kebomas',   
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'NPK Kebomas Komersil',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'SP - 36',
        ]);
        ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'SP - 26',
        ]);
        ProdukVarian::create([
            "id_produk" => $zk->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZK - I',
        ]);
        ProdukVarian::create([
            "id_produk" => $zk->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZK - II',
        ]);
        ProdukVarian::create([
            "id_produk" => $h2so4->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'H2SO4 - I',
        ]);
        ProdukVarian::create([
            "id_produk" => $h2so4->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'H2SO4 - II',
        ]);
        ProdukVarian::create([
            "id_produk" => $h3po4->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'H3PO4 - I',
        ]);
        ProdukVarian::create([
            "id_produk" => $h3po4->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'H3PO4 - II',
        ]);
        ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'HCL A - I',
        ]);
        ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'HCL B - I',
        ]);
        ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'HCL A - II',
        ]);
        ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'HCL B - II ',
        ]);
        
        ProdukVarian::create([
            "id_produk" => $aif3->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'AIF - 3',
        ]);
        
        
    }
}
