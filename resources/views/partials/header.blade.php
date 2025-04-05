 {{-- HEADER --}}
 <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h4 class="font-weight-bolder mt-5"> @yield('nama_laman') </h4>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
            <ul class="navbar-nav justify-content-end ml-auto">
                <li class="nav-item d-xl-none pe-3 d-flex align-items-center ml-2">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        @php
                            use App\Models\User;
                        @endphp

                       <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('profil') }}">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset('style/assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Profil User</span>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">{{ Auth::user()->Nama }} | {{ Auth::user()->Jabatan }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <i class="fas fa-sign-out-alt me-2"></i> <!-- Tambahkan ikon logout di sini -->
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Logout</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- End Navbar -->