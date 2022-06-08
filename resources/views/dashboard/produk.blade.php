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
                            <h3>Persentase Rencana dan Realisasi Produksi </h3>
                            <h5>{{$nama_produk}} Bulan {{date("F", mktime(0, 0, 0, request()->get('bulan'), 10))}} Tahun {{request()->get(('tahun')??$tahun_awal)}}</h5>
                        </div>
                    </div>
                    <div class="d-flex">
                        <form action="">
                            <select name="tahun" id="">
                                @for ($i = $tahun_awal; $i <= now()->year; $i++)
                                    <option value="{{ $i }}"
                                        {{ $i == request()->get('tahun') ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                            <select name="bulan" id="">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}"
                                        {{ $i == request()->get('bulan') ? 'selected' : '' }}>
                                        {{ date("F", mktime(0, 0, 0, $i, 10)) }}</option>
                                @endfor
                            </select>
                            <select name="produk">
                                @foreach ($produk as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $p->id == request()->get('produk') ? 'selected' : '' }}>
                                        {{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                        <button onclick="print()">Cetak</button>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{-- <div id="chart_plot_01" class="demo-placeholder"></div> --}}
                        <div>
                            <canvas id="myChart" height="350px"></canvas>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

        <br />

        <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile ">
                    <div class="x_title">
                        <h2>Prognosa Bulanan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="">

                            {{-- <canvas id='foo'></canvas> --}}
                            <canvas id="foo" class="" style="width: 100%; height: 200px;"></canvas>
                            <h1 class="text-center ">{{number_format($ppb,2,'.')}}%</h1>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile ">
                    <div class="x_title">
                        <h2>Prognosa Bulanan s.d </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="">

                            {{-- <canvas id='foo'></canvas> --}}
                            <canvas id="foo1" class="" style="width: 100%; height: 200px;"></canvas>
                            <h1 class="text-center ">{{number_format($ppbs,2,'.')}}%</h1>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel tile ">
                    <div class="x_title">
                        <h2>Prognosa Tahunan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="">

                            {{-- <canvas id='foo'></canvas> --}}
                            <canvas id="foo2" class="" style="width: 100%; height: 200px;"></canvas>
                            <h1 class="text-center ">{{number_format($ppt,2,'.')}}%</h1>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('script')
    <script>
        var opts = {
            angle: -0.2, // The span of the gauge arc
            lineWidth: 0.2, // The line thickness
            radiusScale: 1, // Relative radius
            pointer: {
                length: 0.6, // // Relative to gauge radius
                strokeWidth: 0.035, // The thickness
                color: '#000000' // Fill color
            },
            limitMax: false, // If false, max value increases automatically if value > maxValue
            limitMin: false, // If true, the min value of the gauge will be fixed
            colorStart: '#6FADCF', // Colors
            colorStop: '#8FC0DA', // just experiment with them
            strokeColor: '#E0E0E0', // to see which ones work best for you
            generateGradient: true,
            highDpiSupport: true, // High resolution support
            staticLabels: {
                font: "15px sans-serif", // Specifies font
                labels: [0,100, 120], // Print labels at these values
                color: "#000000", // Optional: Label text color
                fractionDigits: 0 // Optional: Numerical precision. 0=round off.
            },
            staticZones: [{
                    strokeStyle: "#F03E3E",
                    min: 0,
                    max: 100
                }, // Red from 100 to 130
                {
                    strokeStyle: "#30B32D",
                    min: 100,
                    max: 120
                }
            ],

        };
        
        var gauge = new Gauge(document.getElementById('foo')).setOptions(opts); // create sexy gauge!
        gauge.maxValue = 120; // set max gauge value
        gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge.animationSpeed = 32; // set animation speed (32 is default value)
        gauge.set({{$ppb}}); // set actual value

        var gauge1 = new Gauge(document.getElementById('foo1')).setOptions(opts); // create sexy gauge!
        gauge1.maxValue = 120; // set max gauge value
        gauge1.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge1.animationSpeed = 32; // set animation speed (32 is default value)
        gauge1.set({{$ppbs}}); // set actual value
        
        var gauge2 = new Gauge(document.getElementById('foo2')).setOptions(opts); // create sexy gauge!
        gauge2.maxValue = 120; // set max gauge value
        gauge2.setMinValue(0); // Prefer setter over gauge.minValue = 0
        gauge2.animationSpeed = 32; // set animation speed (32 is default value)
        gauge2.set({{$ppt}}); // set actual value




        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];


        const COLORS = [
            '#4dc9f6',
            '#f67019',
            '#f53794',
            '#537bc4',
            '#acc236',
            '#166a8f',
            '#00a950',
            '#58595b',
            '#8549ba'
        ];

        let lb = [];
        let dtset = @json($produk_varian_pertahun)

        let tt = {};

        dtset.forEach((ee, iidx) => {
            if (tt[ee.stack]) {
                ee.data.forEach((i, idx) => {
                    tt[ee.stack][idx] += i;
                })
            } else {
                tt[ee.stack] = ee.data;
            }

        })
        // console.log(dtset);

        labels.forEach((l, idx) => {
         let nil = 0;
         if (tt['nilai_realisasi'][idx] != 0 && tt['nilai_rencana'][idx] != 0) {
            nil = parseFloat(tt['nilai_realisasi'][idx]) / parseFloat(tt['nilai_rencana'][idx]) * (100)
         }
         lb.push(l + " \n " + parseFloat(nil).toFixed(2) + "%")
      });

        console.log(lb);


        const data = {
            labels: lb,
            datasets: @json($produk_varian_pertahun)
        };

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
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

            },
        });

        
    </script>
@endsection
