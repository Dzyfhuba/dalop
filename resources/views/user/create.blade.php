@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kelola User </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="" method="post" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">


                            @csrf
                            <div class="form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name='name' required="required"
                                        class="form-control col-md-7 col-xs-12"  value="{{ $user->name ?? '' }}">
                                </div>
                                @if ($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor

                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nomor" name="nomor" class="form-control col-md-7 col-xs-12"
                                    value="{{ $user->nomor ?? '' }}">
                                </div>
                                @if ($errors->has('nomor'))
                                    <div class="error">{{ $errors->first('nomor') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="alamat" class="form-control col-md-7 col-xs-12" type="text" name="alamat"
                                    value="{{ $user->alamat ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="jenis Kelamin" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default {{ isset($user->jeniskelamin)?($user->jeniskelamin == 'Laki - laki'?'active':''):'' }}" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jenis_kelamin" value="Laki - laki" required  {{ isset($user->jeniskelamin)?($user->jeniskelamin == 'Laki - laki'?'checked':''):'' }}> &nbsp;
                                            Laki - laki
                                            &nbsp;
                                        </label>
                                        <label class="btn btn-default {{ isset($user->jeniskelamin)?($user->jeniskelamin == 'Perempuan'?'active':''):'' }}" data-toggle-class="btn-default"
                                            data-toggle-passive-class="btn-default">
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" required {{ isset($user->jeniskelamin)?($user->jeniskelamin == 'Perempuan'?'checked':''):'' }}> Perempuan
                                        </label>
                                    </div>
                                    @if ($errors->has('jenis_kelamin'))
                                        <div class="error">{{ $errors->first('jenis_kelamin') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" name='email' class="date-picker form-control col-md-7 col-xs-12"
                                        required="required" type="email"
                                        value="{{ $user->email ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="username" name='username' class="date-picker form-control col-md-7 col-xs-12"
                                        required="required" type="text"
                                        value="{{ $user->username ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" name='password' class="date-picker form-control col-md-7 col-xs-12"
                                         type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Verify Password<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="verify_password" name='verify_password'
                                        class="date-picker form-control col-md-7 col-xs-12"
                                        type="password">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/users" class="btn btn-primary" type="button">Cancel</a>


                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
