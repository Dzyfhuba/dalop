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

                            @foreach ($produkvarian as $pv)
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Realisasi
                                        {{ $pv->produk->nama_produk }} - {{ $pv->nama_produk_varian }}</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" class="form-control" placeholder="Nilai realisasi"
                                            name="{{ $pv->id }}:nilai_realisasi"
                                            value="{{ old($pv->id . ':nilai_realisasi') }}">
                                        @if (Session::has($pv->id . ':nilai_realisasi'))
                                            <small
                                                class="text-danger">{{ Session::get($pv->id . ':nilai_realisasi') }}</small>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Rencana
                                        {{ $pv->produk->nama_produk }} - {{ $pv->nama_produk_varian }}</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" class="form-control" placeholder="Nilai Rencana"
                                            name="{{ $pv->id }}:nilai_rencana"
                                            value="{{ old($pv->id . ':nilai_rencana') }}">
                                        @if (Session::has($pv->id . ':nilai_rencana'))
                                            <small
                                                class="text-danger">{{ Session::get($pv->id . ':nilai_rencana') }}</small>
                                        @endif
                                    </div>


                                </div>
                                <br />
                                <br />
                            @endforeach
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('dataprodukharian') }}" class="btn btn-primary"
                                        type="button">Cancel</a>


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
