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
        <div class="row">
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
        </div>



      
    </div>
</div>
