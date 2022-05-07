@extends('_layouts.master')


@section('head')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/gauge.min.js') }}"></script>
@endsection


@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title d-flex">
                        <div class="col-md-6">
                            <h3>Stock harian bahan baku </h3>

                        </div>
                    </div>
                    <div class="d-flex">
                        <form action="">
                            <select name="tahun" id="">
                                @for ($i = 2019; $i <= date('Y')+5; $i++)
                                    <option value="{{ $i }}"
                                        {{ $i == request()->get('tahun') || $i == date('Y')-1 ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                            <select name="bahan_baku">
                                @foreach ($bahan_baku as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $p->id == request()->get('bahan_baku') ? 'selected' : '' }}>
                                        {{ $p->nama_bahan_baku }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                        <button onclick="print()">Cetak</button>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{-- <div id="chart_plot_01" class="demo-placeholder"></div> --}}
                        <div>
                            <canvas id="chart" height="350px"></canvas>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>

        </div>


    </div>
@endsection


@section('script')
    <script>
        var date_data = @json($data['date']);
        var year_data = {{request()->get('tahun')}};

        var safety_stock = Array(date_data.length).fill({{$s_bahan_baku->safety_stock}});
        var max_stock = Array(date_data.length).fill({{$s_bahan_baku->max}});
        var dead_stock = Array(date_data.length).fill({{$s_bahan_baku->dead_stock}});
    
        
        var today = new Date();
        var date_now = today.getFullYear()+'-'+('0'+(today.getMonth()+1)).slice(-2)+'-'+('0'+today.getDate()).slice(-2);
        console.log(safety_stock);
        var ctx = document.getElementById("chart").getContext('2d');
        var data = {
            labels: date_data,
            datasets: [{
                label: 'Stok',
                data: @json($data['stok']),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                segment: {
                    borderColor: (ctx) => {
                        const xVal = ctx.p1.parsed.x;
                        // console.log(xVal);
                        
                        if (xVal >= date_data.indexOf(date_now) && today.getFullYear() == year_data ) {
                            return 'gray';
                        } else {
                            return 'blue'
                        }
                    }
                },
            },{
                label:'safety stock',
                data: safety_stock,
                fill: false,
                borderColor:'yellow'
            },{
                label:'max',
                data: max_stock,
                fill: false,
                borderColor:'green'
            },{
                label:'dead stock',
                data: dead_stock,
                fill: false,
                borderColor:'red'
            }]
        }
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            legend: {
                display: true,
                labels: {
                    padding: 50
                }
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        grace: '5%'
                    }
                },
                elements: {
                    point:{
                        radius: 0
                    }
                }

            },
        });
    </script>
@endsection
