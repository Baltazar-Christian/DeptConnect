
<div class="row">
    <div class="col-md-6">

            <div class="">
                <div class="">
                    <h5 class="mb-30"><i class="fa fa-calendar text-primary"></i> Today's Collection</h5>
                    <div class="device-manage-progress-chart">
                        <ul>
                            <li class="clearfix">
                                <div class="device-name1">Window</div>
                                <div class="device-progress">
                                    <div class="progress">
                                        <div class="progress-bar window border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="device-total">60</div>
                            </li>
                            <li class="clearfix">
                                <div class="device-name1">Mac</div>
                                <div class="device-progress">
                                    <div class="progress">
                                        <div class="progress-bar mac border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="device-total">20</div>
                            </li>
                            <li class="clearfix">
                                <div class="device-name1">Android</div>
                                <div class="device-progress">
                                    <div class="progress">
                                        <div class="progress-bar android border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="device-total">30</div>
                            </li>
                            <li class="clearfix">
                                <div class="device-name1">Linux</div>
                                <div class="device-progress">
                                    <div class="progress">
                                        <div class="progress-bar linux border-radius-8" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="device-total">10</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">

        <div>
            <button class="btn btn-sm btn-primary" onclick="drawChart('line')">Line Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('bar')">Bar Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('spline')">Spline Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('scatter')">Scatter Chart</button>
            <button class="btn btn-sm btn-primary" onclick="drawChart('area')">Area Chart</button>
        </div>
                <div id="chartHours" style="width:100%; height:400px;"></div>
            </div>
            <div class="col-md-12">
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

       function drawChart(type) {Highcharts.chart('chartHours', {
                chart: {
                    type: type  // Dynamic chart type based on button click
                },
                title: {
                    text: 'Hourly Collection Data'
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

        // Initial draw of the line chart
        drawChart('line');
        drawActivityChart('column');

        function drawActivityChart(type) {
            Highcharts.chart('chartActivity', {
                chart: {
                    type: type
                },
                title: {
                    text: 'Monthly Collection Activities'
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

    <style>
        .custom-control {
            display: flex;
            align-items: center;
        }
        .custom-control-input {
            flex-shrink: 0 !important; /* Prevents the checkbox from being resized */
        }
        .custom-control-label {
            margin-left: 0.5rem !important; /* Adjusts the spacing between checkbox and label */
            overflow: hidden !important; /* Prevents text from overflowing */
            text-overflow: ellipsis !important; /* Adds an ellipsis if the text overflows */
            white-space: nowrap !important; /* Keeps the text on a single line */
        }
    </style>

</div>


