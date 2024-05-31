<style>
    .card.card-separator:after {
    height: 100%;
    right: -15px;
    top: 0;
    width: 1px;
    background-color: #DDDDDD;
    content: "";
    position: absolute;
}

.card .ct-chart {
    margin: 30px 0 30px;
    height: 245px;
}

.ct-perfect-fourth > svg {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
}

.ct-perfect-fifth {
    display: block;
    position: relative;
    width: 100%;
}

.ct-perfect-fifth:before {
    display: block;
    float: left;
    content: "";
    width: 0;
    height: 0;
    padding-bottom: 66.66667%;
}

.ct-perfect-fifth:after {
    content: "";
    display: table;
    clear: both;
}

.ct-perfect-fifth > svg {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
}

.ct-minor-sixth {
    display: block;
    position: relative;
    width: 100%;
}

.ct-minor-sixth:before {
    display: block;
    float: left;
    content: "";
    width: 0;
    height: 0;
    padding-bottom: 62.5%;
}

.ct-minor-sixth:after {
    content: "";
    display: table;
    clear: both;
}

.ct-minor-sixth > svg {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
}
.footer {
    background-color: #FFFFFF;
    line-height: 20px;
    padding: 4px !important;
}

.table .checkbox {
    position: relative;
    height: 20px;
    display: block;
    width: 20px;
    padding: 0px 0px;
    margin: 0px 5px;
    text-align: center;
}



.table .td-actions .btn {
    opacity: 0.36;
    filter: alpha(opacity=36);
}

.table .td-actions .btn.btn-xs {
    padding-left: 3px;
    padding-right: 3px;
}
    </style>
<div class="content">
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="header">
                        <h4 class="title">Email Statistics</h4>
                        <p class="category">Last Campaign Performance</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Bounce
                                <i class="fa fa-circle text-warning"></i> Unsubscribe
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Users Behavior</h4>
                        <p class="category">24 Hours performance</p>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Click
                                <i class="fa fa-circle text-warning"></i> Click Second Time
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Updated 3 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="row">
            <div class="col-md-6">

        <div>
            <button class="btn btn-sm btn-primary" onclick="drawChart('line')">Line Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('bar')">Bar Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('spline')">Spline Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('scatter')">Scatter Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('area')">Area Chart</button>
        </div>
                <div id="chartHours" style="width:100%; height:400px;"></div>
            </div>
            <div class="col-md-6">
                <div>
                    <button class="btn btn-sm btn-primary" onclick="drawActivityChart('column')">Bar Chart</button>
                    <button class="btn btn-sm btn-primary" onclick="drawActivityChart('line')">Line Chart</button>
                    <button class="btn btn-sm btn-primary" onclick="drawActivityChart('spline')">Spline Chart</button>
                    <button class="btn btn-sm btn-primary" onclick="drawActivityChart('scatter')">Scatter Chart</button>
                    <button class="btn btn-sm btn-primary" onclick="drawActivityChart('area')">Area Chart</button>
                </div>
                <div id="chartActivity" style="width:100%; height:400px;"></div>
            </div>
        </div>

        {{-- <div id="chartPreferences" style="width:100%; height:400px;"></div> --}}

        <script>
            function drawHoursChart(type) {
                Highcharts.chart('chartHours', {
                    chart: {
                        type: type
                    },
                    title: {
                        text: 'Hourly Sales Data'
                    },
                    xAxis: {
                        categories: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM']
                    },
                    yAxis: {
                        title: {
                            text: 'Sales'
                        }
                    },
                    series: [{
                        name: 'Series 1',
                        data: [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
                        color: '#00BFFF'
                    }, {
                        name: 'Series 2',
                        data: [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
                        color: '#FF6347'
                    }, {
                        name: 'Series 3',
                        data: [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509],
                        color: '#32CD32'
                    }]
                });
            }

            function drawActivityChart(type) {
                Highcharts.chart('chartActivity', {
                    chart: {
                        type: type
                    },
                    title: {
                        text: 'Monthly Activity'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Activity'
                        }
                    },
                    series: [{
                        name: 'Series 1',
                        data: [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
                        color: '#008080'
                    }, {
                        name: 'Series 2',
                        data: [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695],
                        color: '#FFD700'
                    }]
                });
            }

            // Initial draw of charts
            drawHoursChart('line');
            drawActivityChart('column');

            Highcharts.chart('chartPreferences', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'User Preferences'
                },
                series: [{
                    name: 'Preferences',
                    data: [
                        { name: 'Preference 1', y: 62, color: '#FF4500' },
                        { name: 'Preference 2', y: 32, color: '#1E90FF' },
                        { name: 'Preference 3', y: 6, color: '#32CD32' }
                    ],
                    innerSize: '40%'  // This creates a donut chart
                }]
            });
        </script>
    </div>
</div>

