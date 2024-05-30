<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AdminX - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/css/adminx.css') }} " media="screen" />
  </head>
  <body>
    <div class="adminx-container d-flex justify-content-center align-items-center">
      <div class="page-login">


        <div class="card mb-0">
          <div class="card-body">

          </div>
          <div class="card-seperator">
            <span>DeptConnect</span>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group">
                <label for="exampleDropdownFormEmail1" class="form-label">Email </label>
                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
              </div>
              <div class="form-group">
                <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
              </div>
              <button type="submit" class="btn btn-sm btn-block btn-primary">Sign in</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <a href="#"><small>Forgot your password?</small></a>
          </div>
        </div>
      </div>


    </div>

    <footer>
        <P class="text-center">2024@TazarChriss</P>
    </footer>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src=" {{ asset('dist/js/vendor.js') }} "></script>
    <script src="{{ asset('dist/js/adminx.js') }}"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
  </body>
</html>
