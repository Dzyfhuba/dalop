@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Produk Varian</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ route ('produkvarian.create')}}" type="button" class="btn btn-success"><i class="fa fa-plus"></i>
                                Tambah Produk Varian</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk Varian</th>
                                    <th>Produk</th>
                                    <th>Pabrik</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody> 
             
                        @foreach($produk_varian as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_produk_varian }}</td>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>{{ $item->pabrik->nama_pabrik }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td><a type="button" class="btn btn-warning btn-xs"
                                href={{ route('produkvarian.edit', ['id' => $item->id]) }}>Edit <span
                                    class="glyphicon glyphicon-edit"></span></a>
                                    
                            <a type="button" class="btn btn-danger btn-xs"
                                href={{ route('produkvarian.delete', ['id' => $item->id]) }}>Delete <span
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
