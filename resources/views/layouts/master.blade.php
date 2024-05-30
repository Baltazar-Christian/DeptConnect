<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DeptConnect | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="  {{  asset('dist/css/adminx.css') }} " media="screen" />

  </head>
  <body>
    <div class="adminx-container">

        {{-- start of navbar --}}
        @include('layouts.navbar')
        {{-- end of navbar --}}


      <!-- Sidebar -->
        @include('layouts.leftsidebar')
      <!-- Sidebar End -->

      <!-- adminx-content-aside -->
      <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content1 m-2">
            <div class="">
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

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src=" {{ asset('dist/js/vendor.js') }} "></script>
    <script src=" {{ asset('dist/js/adminx.js') }}"></script>
  </body>
</html>
