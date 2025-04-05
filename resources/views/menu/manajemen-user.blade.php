@extends('main')
@section('title', 'Laman Manajemen User')
@section('nama_laman', 'Laman Manajemen User')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tabel Data User</h6>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('manajemen-user.tambah') }}" class="btn btn-primary me-3 mt-3">+ Tambah User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">NIP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($users as $user)
                                {{-- Alert Data User Tidak Dapat Dihapus karena berelasi --}}
                                    @if(session('success') && session('deleted_id') == $user->id)
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('error') && session('deleted_id') == $user->id)
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                <tr>
                                    <td class="text-center">
                                        <!-- Foto kecil -->
                                        <img src="{{ asset('style/assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        <!-- NIP -->
                                        <span class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $user->NIP }}</span>
                                    </td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $user->Nama }}</td>
                                    <td class="text-center">
                                        @if($user->Jabatan == 'Direktur')
                                            <span class="badge bg-primary">Direktur</span>
                                        @elseif($user->Jabatan == 'Staff')
                                            <span class="badge bg-success">Staff</span>
                                        @elseif($user->Jabatan == 'Finance')
                                            <span class="badge bg-warning">Finance</span>
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('manajemen-user.edit', $user->id) }}" class="badge bg-warning text-decoration-none">Edit</a>
                                        <form action="{{ route('manajemen-user.delete', $user->id) }}" method="POST" class="delete-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger text-decoration-none delete-button" data-id="{{ $user->id }}" data-pengajuan="{{ $user->sedang_pengajuan }}">Hapus</button>
                                        </form>
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
