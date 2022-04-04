@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Data Produk Harian {{ $produk_harian->produk_varian->nama_produk_varian }} - {{$produk_harian->date}}</h2>
                        <div class="clearfix"></div>
                        <div class="x_content">
                            <br />
                            <form method="POST" id="demo-form2" data-parsley-validate
                                class="form-horizontal form-label-left">
                                @csrf
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_realisasi">Nilai
                                        Realisasi<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="nilai_realisasi" name='nilai_realisasi' required="required"
                                            class="form-control col-md-7 col-xs-12"
                                            value="{{ $produk_harian->nilai_realisasi ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_rencana">Nilai
                                        Rencana<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="nilai_rencana" name='nilai_rencana' required="required"
                                            class="form-control col-md-7 col-xs-12"
                                            value="{{ $produk_harian->nilai_rencana ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ route('dataprodukharian') }}" class="btn btn-primary" type="button">Cancel</a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
