{{-- SIDEBAR --}}
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="{{ asset('style/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Website Reimbursement</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Menu Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('dashboard') ? 'bg-primary active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

           <!-- Menu Pengajuan Direktur -->
            @if(auth()->user()->Jabatan === 'Direktur')
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('daftar-pengajuan') ? 'bg-primary active' : '' }}" href="{{ route('daftar-pengajuan') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengajuan Direktur</span>
                    </a>
                </li>
            @endif

            <!-- Menu Pengajuan Finance -->
            @if(auth()->user()->Jabatan === 'Finance')
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('daftar-pengajuan-finance') ? 'bg-primary active' : '' }}" href="{{ route('daftar-pengajuan-finance') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengajuan Finance</span>
                    </a>
                </li>
            @endif

            <!-- Menu Tambah Pengajuan -->
            @if(auth()->user()->Jabatan === 'Staff')
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('proses-pengajuan') ? 'bg-primary active' : '' }}" href="{{ route('proses-pengajuan') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Tambah Pengajuan</span>
                    </a>
                </li>
            @endif

            <!-- Menu Manajemen User -->
            @if(auth()->user()->Jabatan === 'Direktur')
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('manajemen-user') ? 'bg-primary active' : '' }}" href="{{ route('manajemen-user') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <span class="nav-link-text ms-1">Manajemen User</span>
                    </a>
                </li>
            @endif

            <!-- Menu Edit Profil -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('profil') ? 'bg-primary active' : '' }}" href="{{ route('profil') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Edit Profil</span>
                </a>
            </li>
        </ul>
    </div>  
</aside>
