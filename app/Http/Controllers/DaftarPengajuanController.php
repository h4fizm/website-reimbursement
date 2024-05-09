<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarPengajuanController extends Controller
{
    public function index()
    {
        // Ambil semua data pengajuan tanpa mempedulikan status, diurutkan berdasarkan tanggal pembuatan dengan urutan descending
        $pengajuanDirektur = Pengajuan::orderBy('created_at', 'desc')->get();

        return view('menu.daftar-pengajuan', compact('pengajuanDirektur'));
    }



    public function showDetail($id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Ambil data pengajuan berdasarkan id yang diterima

        return view('menu.detail-pengajuan', compact('pengajuan'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => ['required', 'in:dikumpulkan,diproses,disetujui,tidak disetujui'],
        ]);

        // Find the pengajuan by ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Update the status based on the value sent through the request
        $status = $request->input('status');
        $pengajuan->update(['status' => $status]);

        // Set alert message based on the status
        $alertMessage = '';
        if ($status == 'diproses') {
            $alertMessage = 'Pengajuan berhasil disetujui!';
        } elseif ($status == 'tidak disetujui') {
            $alertMessage = 'Pengajuan berhasil ditolak!';
        }
        // Redirect back to the detail page with success message
        return redirect()->route('detail-pengajuan', ['id' => $pengajuan->id])->with('alertMessage', $alertMessage);
    }


    public function download($filename)
    {
        // Path file
        $filePath = storage_path("app/public/$filename");

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Download file
            return response()->download($filePath);
        } else {
            // Jika file tidak ditemukan, tampilkan error 404
            abort(404, 'File not found');
        }
    }

}

