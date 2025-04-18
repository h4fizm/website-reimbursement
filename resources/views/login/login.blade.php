<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('style/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('style/assets/img/favicon.png') }}">
  <title>
    Laman Login
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('style/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('style/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('style/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{ asset('style/assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">Masukkan NIP dan Password</p>
                </div>
                <div class="card-body" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                  <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    @if(session('error'))
                      <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                      </div>
                    @endif
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NIP</label>
                      <input type="number" name="NIP" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('style/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- SweetAlert Script -->
  <script>
    @if(session('error'))
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session('error') }}',
      });
    @endif
  </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('style/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
