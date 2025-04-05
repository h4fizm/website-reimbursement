<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'password',
    ];

    // Fungsi untuk mendapatkan nama pengguna berdasarkan NIP
    public static function getNameByNIP($nip)
    {
        $user = User::where('nip', $nip)->first();
        return $user ? $user->nama : null;
    }

    // Fungsi untuk mendapatkan informasi pengguna berdasarkan NIP
    public static function getInfoByNIP($nip)
    {
        $user = User::where('nip', $nip)->first();
        return $user ? $user->nama . ' | ' . $user->jabatan : null;
    }
}
