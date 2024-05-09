@extends('main')
@section('title', 'Laman Edit User')
@section('nama_laman', 'Edit User')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
         <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ asset('style/assets/img/bruce-mars.jpg') }}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="col-auto my-auto">
                    <div class="mb-0 font-weight-normal text-sm">
                        <h7 class="mb-1">
                            <strong>{{ $user->Nama }} | {{ $user->Jabatan }}</strong>
                        </h7>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 mt-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Form Harus Terisi
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

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

                    <form action="{{ route('manajemen-user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Kolom NIP dan Nama -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="mb-1">NIP</h6>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" id="nip" name="nip" value="{{ $user->NIP }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">Nama</h6>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->Nama }}">
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Password -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="mb-1">Password Baru</h6>
                                <div class="input-group input-group-outline">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-1">Konfirmasi Password Baru</h6>
                                <div class="input-group input-group-outline">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>

                    <!-- Kolom Jabatan -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-1">Jabatan</h6>
                            <div class="input-group input-group-outline">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="jabatan" id="direktur" autocomplete="off" value="Direktur" {{ $user->Jabatan == 'Direktur' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="direktur">Direktur</label>

                                    <input type="radio" class="btn-check" name="jabatan" id="finance" autocomplete="off" value="Finance" {{ $user->Jabatan == 'Finance' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="finance">Finance</label>

                                    <input type="radio" class="btn-check" name="jabatan" id="staff" autocomplete="off" value="Staff" {{ $user->Jabatan == 'Staff' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="staff">Staff</label>
                                </div>
                            </div>
                        </div>
                    </div>


                        <!-- Tombol Simpan dan Kembali -->
                        <div class="row mb-3 justify-content-between">
                            <div class="col-md-6">
                                <a href="{{ route('manajemen-user') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
