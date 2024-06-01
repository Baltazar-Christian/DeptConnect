<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DepLink | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS     -->
    {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    {{-- <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/> --}}


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{  asset('assets/css/demo.css' )}}" rel="stylesheet" />


<!-- Fonts and icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300" rel='stylesheet' type='text/css'>

<!-- Custom icons -->
<link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

<!-- Stylesheets -->
<link href="{{ asset('dist/css/adminx.css') }}" rel="stylesheet" media="screen" />
<link href="https://cdn.jsdelivr.net/npm/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure only one jQuery version is loaded -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>

  </head>
  {{-- <div class="pre-loader"></div> --}}
  <body>

    <div class="adminx-container">

        {{-- start of navbar --}}
        @include('layouts.navbar')
        {{-- end of navbar --}}


      <!-- Sidebar -->
        {{-- @include('layouts.leftsidebar') --}}
      <!-- Sidebar End -->

      <!-- adminx-content-aside -->
      {{-- <div class="adminx-content"> --}}
        <div class="">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content1 m-2">
            <div class="p-2">
                    <!-- BreadCrumb -->
                    <div class="card  p-2">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                            </ol>
                          </nav>

                    </div>

                    @yield('content')
                </div>
        </div>
      </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">

            <p class="copyright pull-right text-center">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">TazarChriss</a>

    <!-- If you prefer jQuery these are the required scripts -->
       	<!--  Charts Plugin -->
	{{-- <script src="{{ asset('assets/js/chartist.min.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src=" {{ asset('dist/js/vendor.js') }} "></script>
    <script src=" {{ asset('dist/js/adminx.js') }}"></script>
	<script src="{{ asset('assetvendors/scripts/script.js') }}"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	{{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('[data-table]').DataTable({
                // Remove the specific columns array to apply default settings to all columns
                // Enable global search functionality
                searching: true,
                // Enable pagination
                paging: true,
                // Set default number of items per page
                pageLength: 10,
                // Enable changing the number of items per page
                lengthChange: true,
                // Options for items per page in the dropdown
                lengthMenu: [ 10, 25, 50, 100 ],
                // Remove ordering from all columns by default, individual columns can be set in the HTML with data-orderable="false"
                ordering: true,
                // Optional: Use this if you want to disable ordering completely
                // ordering: false,
                // Initialize responsive extension if you are using it
                responsive: true
            //     "processing": true,
            // "serverSide": true,
            });

            // Uncomment the following lines if you want to re-enable the custom search functionality
            /*
            $('.form-control-search').keyup(function(){
                table.search($(this).val()).draw();
            });
            */
        });
    </script>


    <script type="text/javascript">
    $(document).ready(function(){

        demo.initChartist();



    });
</script>
  </body>
</html>
