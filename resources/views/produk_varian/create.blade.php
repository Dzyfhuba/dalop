@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Produk Varian</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_produk_varian">Nama Produk Varian<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_produk_varian" name='nama_produk_varian' required="required"
                                        class="form-control col-md-7 col-xs-12" value ="{{ $produk_varian->nama_produk_varian ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
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
                            </div>
                            <div class="form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_produk">Pabrik<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{-- <input type="text" id="pabrik" name='pabrik' required="required"
                                        class="form-control col-md-7 col-xs-12"> --}}
                                        <select name="id_pabrik" id="">
                                            @foreach ($pabrik as $pb)
                                                <option value="{{ $pb->id }}" {{ isset($produk_varian)?($pb->id == $produk_varian->id_pabrik ? 'selected' : '')  : '' }}>{{ $pb->nama_pabrik }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="deskripsi" name='deskripsi' 
                                        class="form-control col-md-7 col-xs-12" value ="{{ $produk_varian->deskripsi ?? '' }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('produkvarian') }}" class="btn btn-primary" type="button">Cancel</a>


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
