@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Stok Bahan Baku Harian </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bahan_baku">Nama Bahan Baku<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="bahan_baku" name='bahan_baku' required="required"
                                    class="form-control col-md-7 col-xs-12" value ="{{ $bahan_baku->nama_bahan_baku ?? '' }}">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="produk">Produk<span
                                    class="required">*</span>
                            </label> 
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="id_produk" id="">
                                        @foreach ($produk as $pd)
                                            <option value="{{ $pd->id }}" {{ isset($produk_varian)?($pd->id == $produk_varian->id_produk ? 'selected' : '')  : '' }}>{{ $pd->nama_produk }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> --}}






                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endsection
            