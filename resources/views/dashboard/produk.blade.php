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
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    stack: 'Stack 0',
                    backgroundColor: '#4dc9f6',
                }, {
                    label: 'Dataset 2',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    stack: 'Stack 0',
                    backgroundColor: COLORS[2],
                },
                {
                    label: 'Dataset 3',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    stack: 'Stack 1',
                    backgroundColor: COLORS[4],
                }, {
                    label: 'Dataset 4',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    stack: 'Stack 1',
                    backgroundColor: COLORS[3],
                },

            ]

        };
        // new Chart(document.getElementById("MyChart"), );

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [2017, 2018, 2019, 2020, 2021, 2022, 2023],
                datasets: [{
                    label: "Income - Base",
                    type: "bar",
                    stack: "Base",
                    backgroundColor: "#eece01",
                    data: [30, 31, 32, 33, 34, 35, 36],
                }, {
                    label: "Tax - Base",
                    type: "bar",
                    stack: "Base",
                    backgroundColor: "#87d84d",
                    data: [-15, -16, -17, -18, -19, -20, -21],
                }, {
                    label: "Income - Sensitivity",
                    type: "bar",
                    stack: "Sensitivity",
                    backgroundColor: "#f8981f",
                    data: [20, 21, 22, 23, 24, 25, 26],
                }, {
                    label: "Tax - Sensitivity",
                    type: "bar",
                    stack: "Sensitivity",
                    backgroundColor: "#00b300",
                    backgroundColorHover: "#3e95cd",
                    data: [-10, -11, -12, -13, -14, -15, -16]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        //stacked: true,
                        stacked: true,
                        
                    }],
                    yAxes: [{
                        stacked: true,
                    }]
                },
            }
        });
    </script>
@endsection
