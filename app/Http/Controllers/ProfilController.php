<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();
        
        // Load ulang data user dari database untuk memastikan data terbaru diambil
        $user->refresh();

        return view("menu.profil", ['user' => $user]);
    }

    public function edit(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'nullable|string|min:5|confirmed',
            'jabatan' => 'required|string|in:direktur,finance,staff',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->NIP = $validatedData['nip'];
        $user->Nama = $validatedData['nama'];
        
        // Periksa apakah password diisi, jika diisi update password
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
        
        $user->Jabatan = $validatedData['jabatan'];
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
