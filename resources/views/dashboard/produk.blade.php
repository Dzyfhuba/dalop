@extends('_layouts.master')


@section('head')
    <script src="{{ asset('js/chart.min.js') }}"></script>
@endsection


@section('content')
    <div class="right_col" role="main">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title d-flex">
                        <div class="col-md-6">
                            <h3>Network Activities <small>Graph title sub-title</small></h3>
                        </div>
                    </div>
                    <div class="d-flex">
                        <select name="tahun" id="">
                            @for ($i = 2020; $i < now()->year+1; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor

                        </select>
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

    </div>
@endsection


@section('script')
    <script>
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
                nil = (tt['nilai_realisasi'][idx] * 100) / tt['nilai_rencana'][idx]
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
