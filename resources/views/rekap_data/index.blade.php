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
                    <div class="x_content">
                            <form action="">
                                <select name="id_produk" id="">
                                    <option value="">All
                                    </option>
                                    @foreach ($a as $pr)
                                        <option value="{{ $pr->id }}">
                                            {{ $pr->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="id_produk_varian" id="">
                                    <option value="">All
                                    </option>
                                    @foreach ($b as $prv)
                                    <option value="{{ $prv->id }}">
                                        {{ $prv->nama_produk_varian }}
                                    </option>
                                    @endforeach
                                </select>
                                <input type="date" name="tgl_awal"  />
                                <input type="date" name="tgl_akhir"/>


                                {{-- <input type="date" name="date" value="{{ Request::get('date') }}" /> --}}
                                <button type="submit">Cari</button>
                                
                            </form>
                        </div>
                        {{  $produk->sum('nilai_realisasi')  }}
                        <br>
                        {{  $produk->sum('nilai_rencana')  }}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Produk Varian</th>
                                    <th>Date</th>
                                    <th>Nilai Realisasi</th>
                                    <th>Nilai Rencana</th>
                                    <th>Persentase</th>
                                    {{-- <th>Jumlah Nilai Realisasi</th>
                                    <th>Jumlah Nilai Rencana</th> --}}
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $p)
                           
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->nama_produk }}</td>
                                        <td>{{ $p->nama_produk_varian }}</td>
                                        <td>{{ $p->date }}</td>
                                        <td>{{ $p->nilai_realisasi }}</td>
                                        <td>{{ $p->nilai_rencana }}</td>
                                        <td>{{ $p->persentase }}</td>
                                        {{-- <td>{{ $p->jumlah_nre }}</td>
                                        <td>{{ $p->jumlah_nra }}</td> --}}
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
