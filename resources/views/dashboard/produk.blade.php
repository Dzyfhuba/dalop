@extends('_layouts.master')


@section('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
@endsection


@section('content')
    <div class="right_col" role="main">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Network Activities <small>Graph title sub-title</small></h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right"
                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{-- <div id="chart_plot_01" class="demo-placeholder"></div> --}}
                        <div>
                            <canvas id="myChart" height="300px"></canvas>
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


        const data = {
            labels: labels,
            datasets: [{
                    label: 'Dataset 1',
                    data: [1, 2, 3, 4, 5],
                    stack: 'm1',
                    backgroundColor: '#4dc9f6',
                }, {
                    label: 'Dataset 2',
                    data: [1, 2, 3, 4, 5],
                    stack: 'm1',
                    backgroundColor: COLORS[2],
                },
                {
                    label: 'Dataset 3',
                    data: [1, 2, 3, 4, 5],
                    stack: 'm2',
                    backgroundColor: COLORS[4],
                }, {
                    label: 'Dataset 4',
                    data: [1, 2, 3, 4, 5],
                    stack: 'm2',
                    backgroundColor: COLORS[3],
                },

            ]

        };

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let datasets = ctx.chart.data
                            .datasets; // Tried `.filter(ds => !ds._meta.hidden);` without success
                            if (ctx.datasetIndex === datasets.length - 1) {
                                let sum = 0;
                                datasets.map(dataset => {
                                    sum += dataset.data[ctx.dataIndex];
                                });
                                return sum.toLocaleString( /* ... */ );
                            } else {
                                return '';
                            }

                        },
                        anchor: 'end',
                        align: 'end'
                    }
                },

                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Task Count'
                        }
                    }]
                },

            }
        });
    </script>
@endsection
