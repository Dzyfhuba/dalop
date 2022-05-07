@extends('_layouts.master')
@section('content')
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rekap Data Bahan Baku </h2>
                        <div class="clearfix">

                        </div>
                    </div>
                    <div class="x_content">
                        <form action="">
                            <input type="date" name="date" value="{{ $date }}" id="">
                            <button>Cari</button>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Nama Bahan BAKU</th>
                                    <th>Jenis</th>
                                    <th>Stock</th>
                                    <th>Safety Stock</th>
                                    <th>Dead Stock</th>
                                    <th>Max</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock as $i => $stk)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $stk->bahan_baku->nama_bahan_baku }}</td>
                                        <td>{{ $stk->bahan_baku->liquid }}</td>
                                        <td>


                                            @if ($stk->stok < $stk->bahan_baku->safety_stock && $stk->bahan_baku->safety_stock != null)
                                                <div style="background-color: orange;color:white">
                                                    {{ $stk->stok }}
                                                </div>
                                            @elseif($stk->stok > $stk->bahan_baku->max && $stk->bahan_baku->max != null)
                                                <div style="background-color: yellow;color:red">
                                                    {{ $stk->stok }}
                                                </div>
                                            @elseif($stk->stok < $stk->bahan_baku->dead_stock && $stk->bahan_baku->dead_stock != null)
                                                <div style="background-color: red;color:white">
                                                    {{ $stk->stok }}
                                                </div>
                                            @else
                                                <div style="background-color: green;color:white">
                                                    {{ $stk->stok }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $stk->bahan_baku->safety_stock }}</td>
                                        <td>{{ $stk->bahan_baku->dead_stock }}</td>
                                        <td>{{ $stk->bahan_baku->max }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <ul style="width: 200px;list-style-type:none;">
                            <li style="background-color: yellow;color:red;padding:10px">Overstock</li>
                            <li style="background-color: green;color:white;padding:10px">Terkendali</li>
                            <li style="background-color: orange;color:white;padding:10px">Dibawah Safety Stock</li>
                            <li style="background-color: red;color:white;padding:10px">Shortage</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
