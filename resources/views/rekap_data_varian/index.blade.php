@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rekap Data Produk Varian </h2>
                        <div class="clearfix"></div>
                    </div>
                    <form action="">
                        <div class="x_content">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Produk Varian</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Nilai Realisasi</th>
                                        <th>Nilai Rencana</th>
                                        <th>Persentase</th>

                                    </tr>
                                </thead>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    @endsection
