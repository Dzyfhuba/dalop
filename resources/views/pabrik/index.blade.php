@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Pabrik</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ route ('pabrik.create')}}" type="button" class="btn btn-success"><i class="fa fa-plus"></i>
                                Tambah Pabrik</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pabrik</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pabrik as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pabrik }}</td>
                                        <td><a href = "{{ route('pabrik.edit',['id' => $item->id])}}" type="button" class="btn btn-warning btn-xs">Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                            <a href = "{{ route('pabrik.delete',['id' => $item->id]) }}" type="button" class="btn btn-danger btn-xs">Delete <span
                                                    class="glyphicon glyphicon-trash"></span></a></td>

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