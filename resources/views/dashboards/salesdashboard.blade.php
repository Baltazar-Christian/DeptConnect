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
                    <h3 class="card-title mb-0">
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
                    <h3 class="card-title mb-0">
                        1,258
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ./ --}}

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
                        role="tab" aria-controls="card-tab-content-1" aria-selected="true">Prospects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-2" role="tab"
                        aria-controls="card-tab-1" aria-selected="false">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-5" role="tab"
                        aria-controls="card-tab-1" aria-selected="false">Follow Ups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-tab-content-4" role="tab"
                        aria-controls="card-tab-1" aria-selected="false">Products</a>
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
                    <h4 class="card-title">Statistics</h4>

                    {{-- Start of Charts --}}
                    @include('sales.charts')
                    {{-- ./ --}}
                </div>
                {{-- ./ --}}

                {{-- For Prospects --}}
                <div class="tab-pane fade" id="card-tab-content-1" role="tabpanel"
                    aria-labelledby="card-tab-1">
                    {{-- Start of Prospects --}}
                    @include('sales.prospects')
                    {{-- ./ --}}
                </div>
                {{-- ./ --}}

                {{-- For Customers --}}
                <div class="tab-pane fade" id="card-tab-content-2" role="tabpanel" aria-labelledby="card-tab-2">
                    <h4 class="card-title">Customers</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                {{-- For Reports --}}

                {{-- For products --}}
                <div class="tab-pane fade" id="card-tab-content-4" role="tabpanel" aria-labelledby="card-tab-2">
                    <h4 class="card-title">Products</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                {{-- ./ --}}


                {{-- For Follow ups --}}
                <div class="tab-pane fade" id="card-tab-content-5" role="tabpanel" aria-labelledby="card-tab-2">
                    <h4 class="card-title">Follow Ups</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>

                {{-- ./ --}}


                <div class="tab-pane fade" id="card-tab-content-3" role="tabpanel" aria-labelledby="card-tab-3">
                    <h4 class="card-title">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

</div>
