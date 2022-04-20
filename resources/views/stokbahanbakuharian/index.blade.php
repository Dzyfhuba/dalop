@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Stok Bahan Baku Harian</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ route('stokbahanbakuharian.create') }}" type="button" class="btn btn-success"><i
                                    class="fa fa-plus"></i>
                                Tambah Data Bahan Baku Harian</a>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Date</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokbahanbakuharian as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->bahan_baku->nama_bahan_baku }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td><a type="button" class="btn btn-warning btn-xs"
                                                href={{ route('stokbahanbakuharian.edit', ['id' => $item->id]) }}>Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                            <a type="button" class="btn btn-danger btn-xs"
                                                href={{ route('stokbahanbakuharian.delete', ['id' => $item->id]) }}>Delete <span
                                                    class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                                </table>
                            </tbody>

                          
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

                        
