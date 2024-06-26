
{{-- Additional links --}}

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href=" {{ asset('vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>


{{-- Start of statistics --}}
<div class="row clearfix progress-box  mt-3">

    {{-- For Customers --}}

    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
            <div class="project-info clearfix">
                <div class="project-info-left">
                    <div class="icon box-shadow bg-light-purple text-white">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="project-info-right">
                    <span class="no text-light-purple weight-500 font-24">5.1 Tsh</span>
                    <p class="weight-400 font-18">Cutomers</p>
                </div>
            </div>
            <div class="project-info-progress">
                <div class="row clearfix">
                    <div class="col-sm-6 text-muted weight-500">Debted  </div>
                    <div class="col-sm-6 text-right weight-500 font-14 text-muted">89/100</div>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-light-purple progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- ./ --}}

    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
            <div class="project-info clearfix">
                <div class="project-info-left">
                    <div class="icon box-shadow bg-light-orange text-white">
                        <i class="fa fa-list-alt"></i>
                    </div>
                </div>
                <div class="project-info-right">
                    <span class="no text-light-orange weight-500 font-24">2 Tsh</span>
                    <p class="weight-400 font-18">Today Task</p>
                </div>
            </div>
            <div class="project-info-progress">
                <div class="row clearfix">
                    {{-- <div class="col-sm-6 text-muted weight-500">Review</div> --}}
                    <div class="col-sm-6 text-right weight-500 font-14 text-muted">1/100</div>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
            <div class="project-info clearfix">
                <div class="project-info-left">
                    <div class="icon box-shadow bg-blue text-white">
                        <i class="fa fa-clipboard"></i>
                    </div>
                </div>
                <div class="project-info-right">
                    <span class="no text-blue weight-500 font-24">40/60</span>
                    <p class="weight-400 font-18">Unscanned Accounts</p>
                </div>
            </div>
            <div class="project-info-progress">
                <div class="row clearfix">
                    {{-- <div class="col-sm-6 text-muted weight-500">Target</div> --}}
                    <div class="col-sm-6 text-right weight-500 font-14 text-muted">40/90</div>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
        <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
            <div class="project-info clearfix">
                <div class="project-info-left">
                    <div class="icon box-shadow bg-light-green text-white">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                </div>
                <div class="project-info-right">
                    <span class="no text-light-green weight-500 font-24">50</span>
                    <p class="weight-400 font-18"> Finished Installments</p>
                </div>
            </div>
            <div class="project-info-progress">
                <div class="row clearfix">
                    {{-- <div class="col-sm-6 text-muted weight-500">Unattended</div> --}}
                    <div class="col-sm-6 text-right weight-500 font-14 text-muted">50/90</div>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-light-green progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>


</div>

{{-- ./  --}}


{{-- Start of collection dashboard --}}
<div>
    <div class="card mb-grid ">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="card-tab-6" data-toggle="tab" href="#card-tab-content-6"
                        role="tab" aria-controls="card-tab-content-6" aria-selected="true">Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="card-tab-1" data-toggle="tab" href="#card-tab-content-1"
                        role="tab" aria-controls="card-tab-content-1" aria-selected="true">All Prospects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-2" role="tab"
                        aria-controls="card-tab-1" aria-selected="false">Collections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-4" role="tab"
                        aria-controls="card-tab-1" aria-selected="false">Finished Installments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-3"
                        role="tab" aria-controls="card-tab-2" aria-selected="false">Reports</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">


                {{-- For Charts --}}
                <div class="tab-pane fade show active" id="card-tab-content-6" role="tabpanel" aria-labelledby="card-tab-6">
                    {{-- <h4 class="card-title">Statistics</h4> --}}

                    {{-- Start of Charts --}}
                    @include('collections.charts')
                    {{-- ./ --}}
                </div>
                {{-- ./ --}}

                {{-- For Prospects --}}
                <div class="tab-pane fade" id="card-tab-content-1" role="tabpanel"
                    aria-labelledby="card-tab-1">
                    {{-- Start of Prospects --}}
                    @include('collections.all')
                    {{-- ./ --}}
                </div>
                {{-- ./ --}}

                {{-- For Customers --}}
                <div class="tab-pane fade" id="card-tab-content-2" role="tabpanel" aria-labelledby="card-tab-2">
                      {{-- Start of Customers --}}
                      @include('collections.pending')
                      {{-- ./ --}}
                </div>
                {{-- For Reports --}}

                {{-- For products --}}
                <div class="tab-pane fade" id="card-tab-content-4" role="tabpanel" aria-labelledby="card-tab-2">
                   {{-- Start of Products --}}
                   @include('collections.closed')
                   {{-- ./ --}}
                </div>
                {{-- ./ --}}





                <div class="tab-pane fade" id="card-tab-content-3" role="tabpanel" aria-labelledby="card-tab-3">
                    <style>
                        @media print {
                            .no-print {
                                display: none;
                            }
                            .print-area {
                                display: block;
                            }
                        }
                    </style>

                    <div class=" ">
                        <h4 class="mb-4 text-center">Collection Department Report</h4>
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group no-print">
                                                <label for="startDate">Start Date:</label>
                                                <input type="date" class="form-control" id="startDate" name="startDate">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group no-print">
                                                <label for="endDate">End Date:</label>
                                                <input type="date" class="form-control" id="endDate" name="endDate">
                                            </div>
                                        </div>
                                    </div>

                                    <button onclick="printReport()" class="btn btn-primary float-right no-print">Print Report</button>

                                </div>
                            </div>

                        </div>

                        <div class="print-area mt-5">
                            <h2>Report from <span id="displayStartDate"></span> to <span id="displayEndDate"></span></h2>
                            <!-- Placeholder for report data -->
                            <p>This section will dynamically display collections data between selected dates.</p>
                        </div>
                    </div>

                    <script>
                        function printReport() {
                            var startDate = document.getElementById('startDate').value;
                            var endDate = document.getElementById('endDate').value;
                            document.getElementById('displayStartDate').textContent = startDate;
                            document.getElementById('displayEndDate').textContent = endDate;
                            window.print();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ./ --}}

