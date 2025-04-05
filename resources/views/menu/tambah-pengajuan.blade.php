@extends('main')
@section('title', 'Laman Tambah Pengajuan')
@section('nama_laman', 'Tambah Pengajuan')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto my-auto">
                <div class="mb-0 font-weight-normal text-sm">
                    <h5 class="mb-1">
                        <strong>Isi Form Dibawah Ini</strong>
                    </h5>
                </div>
            </div>
        </div>
            <!-- Form Pengajuan -->
              <!-- Alert Bootstrap -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{ route('proses-pengajuan.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <!-- Kolom Tanggal Pengajuan -->
                        <div class="col-md-12">
                            <h6 class="mb-1">Tanggal Pengajuan</h6>
                            <div class="input-group input-group-outline">
                                <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom Nama Pengajuan -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-1">Nama Pengajuan</h6>
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" id="nama_pengajuan" name="nama_pengajuan" required>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom Deskripsi Pengajuan -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-1">Deskripsi Pengajuan</h6>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" id="deskripsi_pengajuan" name="deskripsi_pengajuan" required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom Upload File -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-1">Upload File (jpg, png, pdf)</h6>
                            <div class="input-group input-group-outline">
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Simpan dan Kembali -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="{{ route('proses-pengajuan') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
