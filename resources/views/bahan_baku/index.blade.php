@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Bahan Baku</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ route('bahan_baku.create') }}" type="button" class="btn btn-success"><i
                                    class="fa fa-plus"></i>Tambah Bahan Baku</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Jenis Bahan Baku</th>
                                    <th>Safety Stock</th>
                                    <th>Dead Stock</th>
                                    <th>Max</th>
                                    <th>Aksi</th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bahan_baku as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_bahan_baku }}</td>
                                        <td>{{ $item->liquid }}</td>
                                        <td>{{ $item->safety_stock }}</td>
                                        <td>{{ $item->dead_stock }}</td>
                                        <td>{{ $item->max }}</td>
                                        <td><a type="button" class="btn btn-warning btn-xs"
                                                href={{ route('bahan_baku.edit', ['id' => $item->id]) }}>Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>

                                            <a type="button" class="btn btn-danger btn-xs"
                                            href={{ route('bahan_baku.delete', ['id' => $item->id]) }}>Delete <span
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
