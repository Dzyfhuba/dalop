<?php

namespace Database\Seeders;

use DatePeriod;
use DateInterval;
use App\Models\Pabrik;
use App\Models\Produk;
use App\Models\BahanBaku;
use App\Models\User;
use App\Models\StokBahanBakuHarian;
use Nette\Utils\DateTime;
use Illuminate\Support\Str;


use App\Models\ProdukVarian;
use Illuminate\Database\Seeder;
use App\Models\DataProdukHarian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



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
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ]);
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
        $nh3 = BahanBaku::create([
            "nama_bahan_baku" => 'NH3',
            "liquid" => 'liquid',
            "safety_stock" => 10000,
            "dead_stock" => 6000,
            "max" => 36500,
        ]);
        $sa = BahanBaku::create([
            "nama_bahan_baku" => 'SA',
            "liquid" => 'Liquid',
            "safety_stock" => 20000,
            "dead_stock" => 5000,
            "max" => 62000,
        ]);
        $pal = BahanBaku::create([
            "nama_bahan_baku" => 'PA(Liquid + Sludge Actual)',
            "liquid" => 'Liquid',
            "safety_stock" => 22000,
            "dead_stock" => 6000,
            "max" => 58500,
        ]);
        $paa = BahanBaku::create([
            "nama_bahan_baku" => 'PA(Liqud Actual)',
            "liquid" => 'Liquid',
        ]);

        $pr2 = BahanBaku::create([
            "nama_bahan_baku" => 'PR II',
            "liquid" => 'Non Liquid',
            "safety_stock" => 20000,
            "dead_stock" => 10000,
            "max" => 50000,
        ]);
        $pr3a = BahanBaku::create([
            "nama_bahan_baku" => 'PR IIIA',
            "liquid" => 'Non Liquid',
            "safety_stock" => 35000,
            "dead_stock" => 10000,
            "max" => 80000,
        ]);
        $pr3b = BahanBaku::create([
            "nama_bahan_baku" => 'PR IIIB',
            "liquid" => 'Non Liquid',
            "safety_stock" => 35000,
            "dead_stock" => 10000,
            "max" => 45000,
        ]);
        $kclm = BahanBaku::create([
            "nama_bahan_baku" => 'KCL Merah',
            "liquid" => 'Non Liquid',
            "safety_stock" => 27000,
            "dead_stock" => 1000,
            "max" => 54000,
        ]);
        $kclp = BahanBaku::create([
            "nama_bahan_baku" => 'KCL Putih',
            "liquid" => 'Non liquid',
            "safety_stock" => 6000,
            "dead_stock" => 1000,
            "max" => 27000,
        ]);
        $slf = BahanBaku::create([
            "nama_bahan_baku" => 'Sulfur',
            "liquid" => 'Non Liquid',
            "safety_stock" => 18000,
            "dead_stock" => 5000,
            "max" => 75000,
        ]);
        $alo = BahanBaku::create([
            "nama_bahan_baku" => 'AL(OH)3',
            "liquid" => 'Non Liquid',
            "safety_stock" => 2000,
            "dead_stock" => 500,
            "max" => 4000,
        ]);
        $dap = BahanBaku::create([
            "nama_bahan_baku" => 'DAP',
            "liquid" => 'Non Liquid',
            "safety_stock" => 13000,
            "dead_stock" => 1000,
            "max" => 29750,
        ]);
        $ur = BahanBaku::create([
            "nama_bahan_baku" => 'Urea',
            "liquid" => 'Non Liquid',
        ]);
        $zao = BahanBaku::create([
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
        $amoniak1 = ProdukVarian::create([
            "id_produk" => $amoniak->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'Amoniak I',
        ]);
        
        $amoniak2 = ProdukVarian::create([
            "id_produk" => $amoniak->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'Amoniak II',
        ]);

        $urea1 = ProdukVarian::create([
            "id_produk" => $urea->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'Urea I',
        ]);

        $urea2 = ProdukVarian::create([
            "id_produk" => $urea->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'Urea II',
        ]);

        $za1 = ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p1a->id,
            "nama_produk_varian" => 'ZA I',
        ]);

        $za2 = ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZA II',
        ]);

        $za3 = ProdukVarian::create([
            "id_produk" => $za->id,
            "id_pabrik" => $p1b->id,
            "nama_produk_varian" => 'ZA III',
        ]);

        $np1 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'Ph 15-10-12',
        ]);
        
        $np2 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'NPS',
        ]);

        $np3 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'Phonska Plus',
        ]);

        $np4 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'DAP',
        ]);

        $np5 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'NPK Kebomas',
        ]);

        $np6 = ProdukVarian::create([
            "id_produk" => $np->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'NPK Kebomas Komersil',
        ]);

        $sp36a = ProdukVarian::create([
            "id_produk" => $sp36->id,
            "id_pabrik" => $p2b->id,
            "nama_produk_varian" => 'SP - 36',
        ]);

        $sp26a = ProdukVarian::create([
            "id_produk" => $sp26->id,
            "id_pabrik" => $p2a->id,
            "nama_produk_varian" => 'SP - 26',
        ]);

        $zk1 = ProdukVarian::create([
            "id_produk" => $zk->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZK - I',
        ]);

        $zk2 = ProdukVarian::create([
            "id_produk" => $zk->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'ZK - II',
        ]);

        $h2so4_1 = ProdukVarian::create([
            "id_produk" => $h2so4->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'H2SO4 - I',
        ]);

        $h2so4_2 = ProdukVarian::create([
            "id_produk" => $h2so4->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'H2SO4 - II',
        ]);

        $h3po4_1 = ProdukVarian::create([
            "id_produk" => $h3po4->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'H3PO4 - I',
        ]);

        $h3po4_2 = ProdukVarian::create([
            "id_produk" => $h3po4->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'H3PO4 - II',
        ]);

        $hcl1 = ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'HCL A - I',
        ]);

        $hcl2 = ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3a->id,
            "nama_produk_varian" => 'HCL B - I',
        ]);

        $hcl3 = ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'HCL A - II',
        ]);

        $hcl4 = ProdukVarian::create([
            "id_produk" => $hcl->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'HCL B - II ',
        ]);
        
        $aif3_1 = ProdukVarian::create([
            "id_produk" => $aif3->id,
            "id_pabrik" => $p3b->id,
            "nama_produk_varian" => 'AIF - 3',
        ]);

        $begin = new DateTime ('2021-01-01');
        $end = new DateTime('2023-01-01');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ($period as $dt){
            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);

            DataProdukHarian::create([
                "id_produk_varian" => $amoniak1 ->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);

            DataProdukHarian::create([
                "id_produk_varian" => $amoniak2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);
            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $urea1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $urea2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);
            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $za1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $za2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $za3->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1000*100) /100;
            $nilai_rencana = mt_rand (700, 900);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1000*100) /100;
            $nilai_rencana = mt_rand (700, 900);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np3->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np4->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1000, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np5->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (1000*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np6->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $sp36a->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $sp26a->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1000, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1000, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np3->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $np4->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $zk1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $zk2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $h2so4_1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (700, 1200);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $h2so4_2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $h3po4_1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1700);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $h3po4_2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            

            
            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (900, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $hcl1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $hcl2->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $hcl3->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            
            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $hcl4->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);

            $nilai_realisasi = mt_rand (800*100, 1500*100) /100;
            $nilai_rencana = mt_rand (1100, 1500);
            $persentase = round($nilai_realisasi/$nilai_rencana * 100);
            DataProdukHarian::create([
                "id_produk_varian" => $aif3_1->id,
                "date" => $dt->format("d-m-y"),
                "nilai_realisasi" => $nilai_realisasi,
                "nilai_rencana" => $nilai_rencana,
                "persentase" => $persentase,
            ]);


            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $nh3->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);
            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $sa->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 40000),
                "tipe" => $tipe
            ]);
            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $pal->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);
            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $paa->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $pr2->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(7000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $pr3a->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(8000, 40000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $pr3b->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $kclm->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(1000, 30000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $kclp->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(3000, 20000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $slf->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(3000, 35000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $dap->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $alo->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(1000, 10000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $paa->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $ur->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 50000),
                "tipe" => $tipe
            ]);

            $rand = mt_rand(0,1);
            if($rand == 1){
                $tipe = 'realisasi';
            } else {
                $tipe = 'prediksi';
            }

            StokBahanBakuHarian::create([
                "id_bahan_baku" => $zao->id,
                "date" => $dt->format("d-m-Y"),
                "stok" => mt_rand(5000, 30000),
                "tipe" => $tipe
            ]);
        }
        
        
    }
}
