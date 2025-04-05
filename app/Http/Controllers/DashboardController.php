<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class DashboardController extends Controller
{
    public function index()
    {
        $dikumpulkanCount = Pengajuan::where('status', 'Dikumpulkan')->count();
        $diprosesCount = Pengajuan::where('status', 'Diproses')->count();
        $disetujuiCount = Pengajuan::where('status', 'Disetujui')->count();
        $tidakDisetujuiCount = Pengajuan::where('status', 'Tidak Disetujui')->count();

        return view('menu.dashboard', compact('dikumpulkanCount', 'diprosesCount', 'disetujuiCount', 'tidakDisetujuiCount'));
    }
}
