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

                            @foreach ($bahan_baku as $bb)
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        {{ $bb->nama_bahan_baku }}</label>



                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" class="form-control" placeholder="Stok Bahan Baku"
                                            name={{ "nilai[$bb->id]" }} value="{{ $stok[$bb->id]??old("nilai[$bb->id]") }}">
                                        @if (Session::has("nilai[$bb->id]"))
                                            <small class="text-danger">{{ Session::get("nilai[$bb->id]") }}</small>
                                        @endif
                                    </div>

                                </div>

                                <br />
                                <br />
                            @endforeach
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('stokbahanbakuharian') }}" class="btn btn-primary"
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
