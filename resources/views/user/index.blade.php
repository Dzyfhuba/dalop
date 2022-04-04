@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="/users/create" type="button" class="btn btn-success"><i class="fa fa-plus"></i>
                                Tambah User</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengguna as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nomor }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jeniskelamin }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><a type="button" class="btn btn-warning btn-xs" href={{ route('user.edit',['id'=>$item->id]) }}>Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                            <a type="button" class="btn btn-danger btn-xs" href={{ route('user.delete',['id'=>$item->id]) }}>Delete <span
                                                    class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
