{{-- Start of Statistics cards --}}
<div class="row mt-3">
    <div class="col-md-6 col-lg-3 d-flex">
        <div class="card mb-grid w-100">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">
                        Closed Sales
                    </h5>

                    <div class="card-title-sub">
                        Tsh 753.82
                    </div>
                </div>

                <div class="progress mt-auto">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                        aria-valuemax="100">3/4</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 d-flex">
        <div class="card mb-grid w-100">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">
                        Collection Tasks
                    </h5>

                    <div class="card-title-sub">
                        18/30
                    </div>
                </div>

                <div class="progress mt-auto">
                    <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 d-flex">
        <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
                <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                    <i data-feather="calendar"></i>
                </div>
                <div class="card-body">
                    <div class="card-info-title">Credit Sales</div>
                    <h3 class="card-title mb-0 text-light">
                        768
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 d-flex">
        <div class="card border-0 bg-success text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
                <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                    <i data-feather="users"></i>
                </div>
                <div class="card-body">
                    <div class="card-info-title">Cash Sales</div>
                    <h3 class="card-title mb-0 text-light">
                        1,258
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ./ --}}


	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href=" {{ asset('vendors/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
{{-- start of tabs section --}}
<div>
    <div class="card mb-grid">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="card-tab-6" data-toggle="tab" href="#card-tab-content-6"
                        role="tab" aria-controls="card-tab-content-6" aria-selected="true">Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-1" data-toggle="tab" href="#card-tab-content-1"
                        role="tab" aria-controls="card-tab-content-1" aria-selected="false">Prospects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-2" role="tab"
                        aria-controls="card-tab-content-2" aria-selected="false">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-4" data-toggle="tab" href="#card-tab-content-4" role="tab"
                        aria-controls="card-tab-content-4" aria-selected="false">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-3" data-toggle="tab" href="#card-tab-content-3"
                        role="tab" aria-controls="card-tab-content-3" aria-selected="false">Reports</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="card-tab-content-6" role="tabpanel" aria-labelledby="card-tab-6">
                    <h4 class="card-title">Statistics</h4>
                    <!-- Start of Charts -->
                    @include('sales.charts') 
                    
                </div>

                <div class="tab-pane fade" id="card-tab-content-1" role="tabpanel"
                    aria-labelledby="card-tab-1">
                    <!-- Start of Prospects -->
                    @include('sales.prospects')
                </div>

                <div class="tab-pane fade" id="card-tab-content-2" role="tabpanel" aria-labelledby="card-tab-2">
                    <!-- Start of Customers -->
                    @include('sales.customers')
                </div>

                <div class="tab-pane fade" id="card-tab-content-4" role="tabpanel" aria-labelledby="card-tab-4">
                   <!-- Start of Products -->
                   @include('sales.products')
                </div>

                <div class="tab-pane fade" id="card-tab-content-3" role="tabpanel" aria-labelledby="card-tab-3">
                    <h4 class="card-title">Reports</h4>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ./ --}}
