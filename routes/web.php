<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarPengajuanController;
use App\Http\Controllers\DaftarPengajuanFinanceController;
use App\Http\Controllers\ProsesPengajuanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;

Route::get('/', [LoginController::class, 'index']);
// Fungsi Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
// Fungsi Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Menu Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Menu Daftar Pengajuan
Route::get('/daftar-pengajuan', [DaftarPengajuanController::class, 'index'])->name('daftar-pengajuan');
// Detail Pengajuan
Route::get('detail-pengajuan/{id}', [DaftarPengajuanController::class, 'showDetail'])->name('detail-pengajuan');
// Update Status
Route::post('update-status/{id}', [DaftarPengajuanController::class, 'updateStatus'])->name('update-status');
// download file
Route::get('/download/pengajuan/{filename}', [DaftarPengajuanController::class, 'download'])->name('download.pengajuan');


// Menu Daftar Pengajuan Finance
Route::get('/daftar-pengajuan-finance', [DaftarPengajuanFinanceController::class, 'index'])->name('daftar-pengajuan-finance');
// Detail Pengajuan Finance
Route::get('detail-pengajuan-finance/{id}', [DaftarPengajuanFinanceController::class, 'showDetail'])->name('detail-pengajuan-finance');
// Update Status Finance
Route::post('update-status-finance/{id}', [DaftarPengajuanFinanceController::class, 'updateStatus'])->name('update-status-finance');
// download file Finance
Route::get('/download/pengajuan-finance/{filename}', [DaftarPengajuanFinanceController::class, 'download'])->name('download.pengajuan-finance');



// Menu Proses Pengajuan
Route::get('/proses-pengajuan', [ProsesPengajuanController::class, 'index'])->name('proses-pengajuan');
// Form Tambah Pengajuan
Route::get('/proses-pengajuan/tambah', [ProsesPengajuanController::class, 'formtambah'])->name('proses-pengajuan.formtambah');
// Proses Tambah Pengajuan
Route::post('/proses-pengajuan/tambah', [ProsesPengajuanController::class, 'tambah'])->name('proses-pengajuan.tambah');



// Menu Manajemen User
Route::get('/manajemen-user', [UserController::class, 'index'])->name('manajemen-user');
// Form Tambah User
Route::get('/manajemen-user/tambah', [UserController::class, 'formtambah'])->name('manajemen-user.formtambah');
// Tambah User
Route::post('/manajemen-user/tambah', [UserController::class, 'tambah'])->name('manajemen-user.tambah');

// Edit User
Route::get('/manajemen-user/edit/{id}', [UserController::class, 'edit'])->name('manajemen-user.edit');
// Edit User
Route::put('/manajemen-user/update/{id}', [UserController::class, 'update'])->name('manajemen-user.update');
// Delete User
Route::delete('/manajemen-user/{id}', [UserController::class, 'delete'])->name('manajemen-user.delete');


// Menu Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
// Fungsi Edit Profil
Route::post('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
