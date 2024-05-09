@extends('main')
@section('title', 'Laman Tambah Pengajuan')
@section('nama_laman', 'Proses Pengajuan')
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
        <div class="col-12">
            <div class="card my-4">
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
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Status Pengajuan</h6>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('proses-pengajuan.tambah') }}" class="btn btn-primary me-3 mt-3">+ Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama/Jabatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pengajuan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                </tr>
                            </thead>
                           <tbody>
                                @foreach($pengajuan as $pengajuan)
                                <tr>
                                    <td class="text-center text-xs font-weight-bold">{{ $pengajuan->user->Nama }} | {{ $pengajuan->user->Jabatan }}</td>
                                    <td class="text-center text-xs">{{ $pengajuan->nama_pengajuan }}</td>
                                    <td class="text-center text-xs">{{ $pengajuan->tanggal_pengajuan ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('j F Y') : '-' }}</td>
                                    <td class="text-center text-xs">
                                        @if($pengajuan->status == 'dikumpulkan')
                                        <span class="badge badge-pill bg-gradient-secondary">Dikumpulkan</span>
                                        @elseif($pengajuan->status == 'diproses')
                                        <span class="badge badge-pill bg-gradient-warning">Diproses</span>
                                        @elseif($pengajuan->status == 'diproses')
                                        <span class="badge badge-pill bg-gradient-success">Disetujui</span>
                                        @elseif($pengajuan->status == 'disetujui')
                                        <span class="badge badge-pill bg-gradient-success">Disetujui</span>
                                        @elseif($pengajuan->status == 'tidak disetujui')
                                        <span class="badge badge-pill bg-gradient-danger">Tidak Disetujui</span>
                                        @else
                                        <span class="badge badge-pill bg-gradient-danger">Tidak Diketahui</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
