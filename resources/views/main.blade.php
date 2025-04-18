<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('style/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('style/assets/img/favicon.png') }}">
  <title>
     @yield('title')
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
</head>

<body class="g-sidenav-show  bg-gray-200">
{{-- SIDEBAR --}}
@include('partials.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   {{-- HEADER --}}
   @include('partials.header')
    <div class="container-fluid py-4">
    {{-- MAIN KONTEN --}}
      @yield('content')
      {{-- FOOTER --}}
    @include('partials.footer')
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('style/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('style/assets/js/plugins/chartjs.min.js') }}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('style/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
  {{-- Sweet Alert Confirm Delete --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
      // Get all elements with the delete-button class
      const deleteButtons = document.querySelectorAll('.delete-button');

      // Add click event listener to each delete button
      deleteButtons.forEach(button => {
          button.addEventListener('click', function(event) {
              event.preventDefault(); // Prevent default form submission

              const userId = this.getAttribute('data-id'); // Get user ID from data-id attribute

              swal({
                  title: "Apakah Anda yakin?",
                  text: "Setelah dihapus, Anda tidak akan bisa mengembalikan data ini!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              }).then((willDelete) => {
                  if (willDelete) {
                      // Submit the form if the user confirms the deletion
                      this.closest('form').submit();
                  }
              });
          });
      });
  </script>
</body>

</html>