@extends('main')
@section('title', 'Tambah User')
@section('nama_laman', 'Tambah User')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <!-- Content for profile display goes here -->
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('manajemen-user.tambah') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-1">NIP</h6>
                            <div class="input-group input-group-outline">
                                <label class="form-label"></label>
                                <input type="number" class="form-control" id="nip" name="nip" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1">Nama</h6>
                            <div class="input-group input-group-outline">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-1">Password</h6>
                            <div class="input-group input-group-outline">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-1">Re-type Password</h6>
                            <div class="input-group input-group-outline">
                                <label class="form-label">Retype Password</label>
                                <input type="password" class="form-control" id="retype_password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="mb-1">Jabatan</h6>
                            <div class="input-group input-group-outline">
                                <label class="form-label"></label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="jabatan" id="direktur" autocomplete="off" value="direktur" {{ Auth::user()->Jabatan == 'direktur' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="direktur">Direktur</label>

                                    <input type="radio" class="btn-check" name="jabatan" id="finance" autocomplete="off" value="finance" {{ Auth::user()->Jabatan == 'finance' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="finance">Finance</label>

                                    <input type="radio" class="btn-check" name="jabatan" id="staff" autocomplete="off" value="staff" {{ Auth::user()->Jabatan == 'staff' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="staff">Staff</label>
                                </div>
                            </div>
                        </div>
                    </div>
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
