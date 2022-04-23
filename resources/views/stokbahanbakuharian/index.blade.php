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
                        <div>
                            <form action="">

                                <input type="date" name="first_date" value="{{request()->first_date ?? $first_date}}">
                                <input type="date" name="end_date" value="{{request()->end_date ?? $end_date}}">
                                <button type="submit">Cari</button>
                            </form>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    @foreach ($bahan_baku as $bbr)
                                        <th>{{ $bbr->nama_bahan_baku }}</th>
                                    @endforeach
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bb as $i => $b)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $i }}</td>
                                        @foreach ($bahan_baku as $bb)
                                            <td>{{ $b[$bb->id] }}</td>
                                        @endforeach

                                        <td><a type="button" class="btn btn-warning btn-xs"
                                                href={{ route('stokbahanbakuharian.edit', ['date' => $i]) }}>Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>

                                            <a type="button" class="btn btn-danger btn-xs"
                                                href={{ route('stokbahanbakuharian.delete', ['date' => $i]) }}>Delete
                                                <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @foreach ($stokbahanbakuharian as $item)
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
                                    
                                @endforeach --}}
                        </table>
                        </tbody>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
