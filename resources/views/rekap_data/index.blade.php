@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rekap Data </h2>
                        <div class="clearfix"></div>
                    </div>
                    <form action="">
                        <div class="x_content">
                            <input type="date" name="tanggal_harian" value="{{ request()->tanggal_harian ?? $date }}">
                            <button>Cari</button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Date</th>
                                        <th>Nilai Realisasi</th>
                                        <th>Nilai Rencana</th>
                                        <th>Persentase</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_produk_harian as $idx => $dph)
                                        <tr>
                                            <td>{{ $idx + 1 }}</td>
                                            <td>{{ $dph->produk }}</td>
                                            <td>{{ $dph->date }}</td>
                                            <td>{{ $dph->nilai_realisasi }}</td>
                                            <td>{{ $dph->nilai_rencana }}</td>
                                            <td>
                                                @if ($dph->nilai_realisasi != 0 && $dph->nilai_rencana != 0)
                                                    {{ ($dph->nilai_realisasi * 100) / $dph->nilai_rencana }}
                                                @else
                                                    0
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <input type="date" name="first_date" value="{{ request()->first_date ?? $first_date }}">
                            <input type="date" name="end_date" value="{{ request()->end_date ?? $end_date }}">
                            <button>Cari</button>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Nilai Realisasi</th>
                                        <th>Nilai Rencana</th>
                                        <th>Persentase</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_produk_bulanan as $idx => $dph)
                                        <tr>
                                            <td>{{ $idx + 1 }}</td>
                                            <td>{{ $dph->produk }}</td>
                                            <td>{{ $first_date }}</td>
                                            <td>{{ $end_date }}</td>
                                            <td>{{ $dph->nilai_realisasi }}</td>
                                            <td>{{ $dph->nilai_rencana }}</td>
                                            <td>
                                                @if ($dph->nilai_realisasi != 0 && $dph->nilai_rencana != 0)
                                                    {{ ($dph->nilai_realisasi * 100) / $dph->nilai_rencana }}
                                                @else
                                                    0
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
