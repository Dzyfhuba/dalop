@extends('_layouts.master')
@section('content')

    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Produk </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_produk">Nama Produk<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_produk" name='nama_produk' required="required"
                                        class="form-control col-md-7 col-xs-12" value ="{{ $produk->nama_produk ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi<span
                                        >*</span>
                                </label> 
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="deskripsi" name='deskripsi' 
                                        class="form-control col-md-7 col-xs-12" value ="{{ $produk->deskripsi ?? '' }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('produk') }}" class="btn btn-primary" type="button">Cancel</a>


                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
