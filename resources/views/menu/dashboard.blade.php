@extends('main')
@section('title', 'Dashboard Utama')
@section('nama_laman', 'Laman Dashboard')
@section('content')
{{-- Progress Bar --}}
<style>
.step-wizard-list {
    background: none;
    box-shadow: none;
    color: #333;
    list-style-type: none;
    border-radius: 10px;
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}

.step-wizard-item {
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}

.step-wizard-item+.step-wizard-item:after {
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background: black;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}

.progress-count {
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index: 10;
    color: black; /* Mengubah warna angka menjadi hitam */
    border: 2px solid black; /* Menambahkan border hitam */
    box-sizing: border-box; /* Memastikan border tidak memengaruhi ukuran elemen */
}

.progress-count:before {
    content: ""; /* Tambahkan elemen pseudo untuk lingkaran di belakang angka */
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: #fff;
    border-radius: 50%;
    z-index: -1;
}

.progress-label {
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
    color: black; /* Mengubah warna label menjadi hitam */
}

.current-item .progress-count:before,
.current-item~.step-wizard-item .progress-count:before {
    display: none;
}

.current-item~.step-wizard-item .progress-count:after {
    height: 10px;
    width: 10px;
}

.current-item~.step-wizard-item .progress-label {
    opacity: 0.5;
}

.current-item .progress-count:after {
    background: #fff;
    border: 2px solid #21d4fd;
}

.current-item .progress-count {
    color: #21d4fd;
}
</style>


<div class="container-fluid px-2 px-md-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-gradient-secondary">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pengajuan Dikumpulkan</p>
                        <h4 class="mb-0">{{ $dikumpulkanCount }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-gradient-warning">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute text-warning">
                        <i class="material-icons opacity-10 text-white">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pengajuan Diproses</p>
                        <h4 class="mb-0">{{ $diprosesCount }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card bg-gradient-success">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute text-success">
                        <i class="material-icons opacity-10 text-white">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pengajuan Disetujui</p>
                        <h4 class="mb-0">{{ $disetujuiCount }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-gradient-danger">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-info text-center border-radius-xl mt-n4 position-absolute text-danger">
                        <i class="material-icons opacity-10 text-white">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pengajuan Tidak Disetujui</p>
                        <h4 class="mb-0">{{ $tidakDisetujuiCount }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">

                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card my-4 mt-5">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tahapan Proses Pengajuan</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <section class="step-wizard">
                        <ul class="step-wizard-list">
                            <li class="step-wizard-item">
                                <span class="progress-count">1</span>
                                <span class="progress-label">Pengumpulan Pengajuan</span>
                            </li>
                            <li class="step-wizard-item">
                                <span class="progress-count">2</span>
                                <span class="progress-label">Disetujui Direktur</span>
                            </li>
                            <li class="step-wizard-item">
                                <span class="progress-count">3</span>
                                <span class="progress-label">Disetujui oleh Finance</span>
                            </li>
                            <li class="step-wizard-item">
                                <span class="progress-count">4</span>
                                <span class="progress-label">Selesai</span>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12">
            <div class="card my-4 mt-5">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Indikator Status Pengajuan</h6>
                    </div>
                </div>
            <div class="card-body px-4 pb-2">
                <div class="card-body px-4 pb-2">
                <div class="badge-container" style="margin-bottom: 15px;"> <!-- Menambahkan style langsung di sini -->
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="badge badge-pill bg-gradient-secondary">Dikumpulkan</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="flex-grow-1 pe-3">Dokumen Berhasil Dikirim</span>
                    </div>
                </div>

                <div class="badge-container" style="margin-bottom: 15px;"> <!-- Menambahkan style langsung di sini -->
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="badge badge-pill bg-gradient-warning">Diproses</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="flex-grow-1 pe-3">Dokumen dalam proses review oleh Direktur atau Finance</span>
                    </div>
                </div>

                <div class="badge-container" style="margin-bottom: 15px;"> <!-- Menambahkan style langsung di sini -->
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="badge badge-pill bg-gradient-success">Disetujui</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="flex-grow-1 pe-3">Dokumen Pengajuan Telah Disetujui</span>
                    </div>
                </div>

                <div class="badge-container" style="margin-bottom: 15px;"> <!-- Menambahkan style langsung di sini -->
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="badge badge-pill bg-gradient-danger">Tidak Disetujui</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="flex-grow-1 pe-3">Dokumen Pengajuan Tidak Disetujui</span>
                    </div>
                </div>

                <div class="badge-container" style="margin-bottom: 15px;"> <!-- Menambahkan style langsung di sini -->
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="badge badge-pill bg-gradient-danger">Tidak Diketahui</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> 
                        <span class="flex-grow-1 pe-3">Status Dokumen Tidak Diketahui</span>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection