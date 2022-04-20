@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Bahan Baku </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_bahan_baku">Nama Bahan
                                    Baku<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_bahan_baku" name='nama_bahan_baku' required="required"
                                        class="form-control col-md-7 col-xs-12"
                                        value="{{ $bahan_baku->nama_bahan_baku ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Bahan Baku<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="liquid" class="btn-group" data-toggle="buttons">
                                        <label
                                            class="btn btn-default {{ isset($liquid->jenisbahanbaku) ? ($liquid->jenisbahanbaku == 'Liquid' ? 'active' : '') : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="liquid" value="Liquid" required
                                                {{ isset($liquid->jenisbahanbaku) ? ($liquid->jenisbahanbaku == 'Liquid' ? 'checked' : '') : '' }}>
                                            &nbsp;
                                            Liquid
                                            &nbsp;
                                        </label>
                                        <label
                                            class="btn btn-default {{ isset($liquid->jenisbahanbaku) ? ($liquid->jenisbahanbaku == 'Non Liquid' ? 'active' : '') : '' }}" 
                                            data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="liquid" value="Non Liquid" required
                                                {{ isset($liquid->jenisbahanbaku) ? ($liquid->jenisbahanbaku == 'Non Liquid' ? 'checked' : '') : '' }}>
                                            Non Liquid
                                        </label>
                                    </div>
                                    @if ($errors->has('liquid'))
                                        <div class="error">{{ $errors->first('liquid') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Safety Stock

                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="safety_stock" name="safety_stock" required="required" class="form-control col-md-7 col-xs-12"
                                    value="{{ $bahan_baku->safety_stock ?? '' }}">
                                </div>
                                @if ($errors->has('safety_stock'))
                                    <div class="error">{{ $errors->first('safety_stock') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dead Stock

                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="dead_stock" name="dead_stock" required="required"class="form-control col-md-7 col-xs-12"
                                    value="{{ $bahan_baku->dead_stock ?? '' }}">
                                </div>
                                @if ($errors->has('dead_stock'))
                                    <div class="error">{{ $errors->first('dead_stock') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Max
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="max" name="max"required="required" class="form-control col-md-7 col-xs-12"
                                    value="{{ $bahan_baku->max ?? '' }}">
                                </div>
                                @if ($errors->has('max'))
                                    <div class="error">{{ $errors->first('max') }}</div>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('bahan_baku') }}" class="btn btn-primary" type="button">Cancel</a>


                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
