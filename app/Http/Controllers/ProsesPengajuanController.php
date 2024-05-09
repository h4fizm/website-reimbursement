<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProsesPengajuanController extends Controller
{

    public function index()
    {
        // Ambil data pengajuan yang sesuai dengan pengguna yang sedang login
        $user = Auth::user();
        $pengajuan = Pengajuan::whereHas('user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->orderBy('created_at', 'desc')->get();

        return view('menu.tahapan-pengajuan', compact('pengajuan'));
    }


    public function formtambah()
    {
        return view('menu.tambah-pengajuan');
    }


    public function tambah(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'tanggal_pengajuan' => 'required|date',
            'nama_pengajuan' => 'required|string',
            'deskripsi_pengajuan' => 'required|string',
            'file' => 'required|file|mimes:jpg,png,pdf|max:2048', // maksimum 2MB
        ]);

        // Proses upload file
        if ($request->hasFile('file')) {
            // Simpan file ke direktori yang diinginkan
            $file_path = $request->file('file')->store('uploads', 'public');
        } else {
            // Jika tidak ada file yang diunggah, redirect kembali dengan pesan kesalahan
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        // Menentukan status default
        $statusDefault = 'Dikumpulkan';

        // Simpan informasi pengumpul (ambil informasi dari user yang saat ini login)
        $user = Auth::user();

        // Buat entri baru di database
        $pengajuan = new \App\Models\Pengajuan();
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->nama_pengajuan = $request->nama_pengajuan;
        $pengajuan->deskripsi_pengajuan = $request->deskripsi_pengajuan;
        $pengajuan->file_pengajuan = $file_path;
        $pengajuan->status = $statusDefault;
        $pengajuan->user_id = $user->id; // Simpan ID pengguna yang membuat pengajuan
        $pengajuan->save();

        // Redirect kembali ke halaman yang sama dengan pesan sukses
        return redirect()->back()->with('success', 'Data pengajuan berhasil ditambahkan.');
    }
}