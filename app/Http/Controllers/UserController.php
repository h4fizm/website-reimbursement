<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Pengajuan;

class UserController extends Controller
{
    // Menampilkan halaman manajemen user
    public function index()
    {
        // Mendapatkan semua data user dari database dan diurutkan berdasarkan id secara descending
        $users = User::orderBy('id', 'desc')->get();

        // Menambahkan properti badge ke setiap objek pengguna
        foreach ($users as $user) {
            $user->badge = $this->getBadgeColor($user->jabatan);
        }

        // Mengirim data user ke view
        return view('menu.manajemen-user', compact('users'));
    }

    // Fungsi untuk mendapatkan warna badge berdasarkan jabatan
    private function getBadgeColor($jabatan)
    {
        switch ($jabatan) {
            case 'Direktur':
                return 'primary';
            case 'Staff':
                return 'success';
            case 'Finance':
                return 'warning';
            default:
                return 'secondary';
        }
    }

    // Fungsi untuk menampilkan form tambah user
    public function formtambah()
    {
        return view('menu.tambah-user');
    }

    // Fungsi untuk menambahkan user baru
    public function tambah(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nip' => 'required|unique:users,nip',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'jabatan' => 'required',
        ]);

        // Buat user baru
        $user = new User();
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password); // Enkripsi password
        $user->jabatan = $request->jabatan;
        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    // Fungsi untuk menampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('menu.edit-user', compact('user'));
    }


    // Fungsi untuk menyimpan perubahan pada user// Fungsi untuk menyimpan perubahan pada user
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nip' => 'required|unique:users,nip,' . $id,
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        // Cek jika ada bidang lain yang kosong
        if (!$request->filled('nip') || !$request->filled('nama') || !$request->filled('jabatan')) {
            return redirect()->back()->with('error', 'Form harus diisi lengkap.');
        }

        // Cari user yang akan diubah
        $user = User::findOrFail($id);
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;

        // Perbarui password jika password baru tidak kosong
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Coba menyimpan perubahan
        try {
            $user->save();
            return redirect()->back()->with('success', 'User berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui user. Silakan coba lagi.');
        }
    }
    public function delete($id)
    {
        try {
            // Cek apakah user sedang melakukan pengajuan
            $pengajuan = Pengajuan::where('user_id', $id)->exists();
    
            if ($pengajuan) {
                return redirect()->route('manajemen-user')->with('error', 'User sedang melakukan pengajuan dan tidak dapat dihapus.')->with('deleted_id', $id);
            }
    
            // Jika tidak ada pengajuan, hapus user
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('manajemen-user')->with('success', 'User berhasil dihapus.')->with('deleted_id', $id);
        } catch (QueryException $e) {
            return redirect()->route('manajemen-user')->with('error', 'Gagal menghapus user. Silakan coba lagi.')->with('deleted_id', $id);
        }
    }
}    