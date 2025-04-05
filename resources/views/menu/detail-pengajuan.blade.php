@extends('main')
@section('title', 'Laman Detail Pengajuan')
@section('nama_laman', 'Detail Informasi Pengajuan')
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
                    <h4 class="mb-3">
                        <strong>{{ $pengajuan->nama_pengajuan }}</strong>
                    </h4>
                </div>
            </div>
        </div>
            {{-- Alert --}}
            @if(session('alertMessage'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('alertMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                    <!-- Kolom Tanggal Pengajuan -->
                    <div class="col-md-12">
                        <h6 class="mb-1">Tanggal Pengajuan</h6>
                        <div class="input-group input-group-outline">
                            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ $pengajuan->tanggal_pengajuan->format('Y-m-d') }}" required readonly> <!-- Isi nilai tanggal_pengajuan -->
                        </div>
                    </div>
                                                        
                    <!-- Kolom Nama Pengajuan -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-1">Nama Pengajuan</h6>
                            <div class="input-group input-group-outline">
                                <input type="text" class="form-control" id="nama_pengajuan" name="nama_pengajuan" value="{{ $pengajuan->nama_pengajuan }}" required readonly> <!-- Isi nilai nama_pengajuan -->
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Deskripsi Pengajuan -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="mb-1">Deskripsi Pengajuan</h6>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control" id="deskripsi_pengajuan" name="deskripsi_pengajuan" required readonly>{{ $pengajuan->deskripsi_pengajuan }}</textarea> <!-- Isi nilai deskripsi_pengajuan -->
                            </div>
                        </div>
                    </div>

                  <div class="row-md-3">
                        <div class="input-group input-group-outline">
                            <a href="{{ asset('storage/' . $pengajuan->file_pengajuan) }}" target="_blank">Klik ini untuk mendownload File</a>
                        </div>
                    </div>


                    
                    <!-- Tombol Simpan dan Kembali -->
                    <div class="row mt-3 justify-content-between">
                        <div class="col-md-6">
                            <a href="{{ route('daftar-pengajuan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <form action="{{ route('update-status', ['id' => $pengajuan->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="status" value="diproses">
                                <button type="submit" class="btn btn-primary">Disetujui</button>
                            </form>
                            <form action="{{ route('update-status', ['id' => $pengajuan->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="status" value="tidak disetujui">
                                <button type="submit" class="btn btn-danger">Tidak Disetujui</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
