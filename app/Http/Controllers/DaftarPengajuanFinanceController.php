<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DaftarPengajuanFinanceController extends Controller
{
    public function index()
    {
        // Ambil data pengajuan dengan status 'diproses', 'disetujui', dan 'tidak disetujui'
        $pengajuanFinance = Pengajuan::whereIn('status', ['diproses', 'disetujui', 'tidak disetujui'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('menu.daftar-pengajuan-finance', compact('pengajuanFinance'));
    }



    public function showDetail($id)
    {
        $pengajuan = Pengajuan::findOrFail($id); // Ambil data pengajuan berdasarkan id yang diterima

        return view('menu.detail-pengajuan-finance', compact('pengajuan'));
    }



    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => ['required', 'in:dikumpulkan,diproses,disetujui,tidak disetujui'],
        ]);

        // Find the pengajuan by ID
        $pengajuanFinance = Pengajuan::findOrFail($id);

        // Update the status based on the value sent through the request
        $status = $request->input('status');
        $pengajuanFinance->update(['status' => $status]);

        // Set alert message based on the status
        $alertMessage = '';
        if ($status == 'disetujui') {
            $alertMessage = 'Pengajuan berhasil disetujui!';
            Session::flash('alertType', 'success');
        } elseif ($status == 'tidak disetujui') {
            $alertMessage = 'Pengajuan berhasil ditolak!';
            Session::flash('alertType', 'danger');
        } else {
            // For other statuses, no specific message
            $alertMessage = 'Status berhasil diperbarui!';
        }

        // Redirect back to the detail page with success message
        if ($status == 'tidak disetujui') {
            // Jika status adalah "tidak disetujui", redirect ke halaman index finance
            return Redirect::route('daftar-pengajuan-finance')->with('alertMessage', $alertMessage);
        } else {
            // Jika status bukan "tidak disetujui", redirect ke halaman detail dengan status yang diperbarui
            return redirect()->route('detail-pengajuan-finance', ['id' => $pengajuanFinance->id])->with('alertMessage', $alertMessage);
        }
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
