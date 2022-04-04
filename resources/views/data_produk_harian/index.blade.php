@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Produk Harian</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ route('dataprodukharian.create') }}" type="button" class="btn btn-success"><i
                                    class="fa fa-plus"></i>
                                Tambah Data Produk Harian</a>
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div>
                            <form action="">
                                <select name="id_produk_varian" id="">
                                    <option value="">All
                                    </option>
                                    @foreach ($produk_varian as $pv)
                                        <option value="{{ $pv->id }}"
                                            {{ Request::get('id_produk_varian') == $pv->id ? 'selected' : '' }}>
                                            {{ $pv->nama_produk_varian }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="date" name="date" value="{{ Request::get('date') }}" />
                                <button type="submit">Cari</button>
                            </form>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Produk Varian</th>
                                    <th>Pabrik</th>
                                    <th>Nilai Realisasi</th>
                                    <th>Nilai Rencana</th>
                                    <th>Persentase</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk_harian as $idx => $ph)
                                    <tr>
                                        <td>{{ $idx + 1 }}</td>
                                        <td>{{ $ph->date }}</td>
                                        <td>{{ $ph->produk_varian->nama_produk_varian }}</td>
                                        <td>{{ $ph->produk_varian->pabrik->nama_pabrik }}</td>
                                        <td>{{ $ph->nilai_realisasi }}</td>
                                        <td>{{ $ph->nilai_rencana }}</td>
                                        <td>{{ $ph->persentase }}</td>
                                        <td><a href="{{ route('dataprodukharian.edit', ['id' => $ph->id]) }}" type="button"
                                                class="btn btn-warning btn-xs">Edit <span
                                                    class="glyphicon glyphicon-edit"></span></a>
                                            <a href="{{ route('dataprodukharian.delete', ['id' => $ph->id]) }}" type="button"
                                                class="btn btn-danger btn-xs">Delete <span
                                                    class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $produk_harian->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
