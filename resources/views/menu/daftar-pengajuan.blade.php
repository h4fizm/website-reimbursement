@extends('main')
@section('title', 'Laman Daftar Pengajuan')
@section('nama_laman', 'Daftar Pengajuan')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Data Pengajuan ke Direktur</h6>
                    </div>
                </div>
                {{-- Daftar Pengajuan Direktur --}}
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama/Jabatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pengajuan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($pengajuanDirektur as $pengajuan)
                                <tr>
                                    <td class="text-center text-xs font-weight-bold">{{ $pengajuan->user->Nama }} | {{ $pengajuan->user->Jabatan }}</td>
                                    <td class="text-center text-xs">{{ $pengajuan->nama_pengajuan }}</td>
                                    <td class="text-center text-xs">{{ $pengajuan->tanggal_pengajuan ? \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('j F Y') : '-' }}</td>
                                    <td class="text-center text-xs">
                                        @if($pengajuan->status == 'dikumpulkan')
                                            <span class="badge badge-pill bg-gradient-secondary">Dikumpulkan</span>
                                        @elseif($pengajuan->status == 'diproses')
                                            <span class="badge badge-pill bg-gradient-success">Disetujui</span>
                                        @elseif($pengajuan->status == 'disetujui')
                                            <span class="badge badge-pill bg-gradient-success">Disetujui</span>
                                        @elseif($pengajuan->status == 'tidak_disetujui')
                                            <span class="badge badge-pill bg-gradient-danger">Tidak Disetujui</span>
                                        @else
                                            <span class="badge badge-pill bg-gradient-danger">{{ $pengajuan->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center text-xs">
                                        <a href="{{ route('detail-pengajuan', ['id' => $pengajuan->id]) }}" class="badge badge-pill bg-gradient-info">Detail</a>
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
