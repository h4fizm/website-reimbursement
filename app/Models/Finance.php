<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'pengajuan'; // Ubah ke nama tabel yang benar
    
    protected $fillable = [
        'nama_pengajuan', // Ubah sesuai dengan kolom yang ada pada tabel finance
        // Tambahkan kolom-kolom lain yang ada pada tabel finance
    ];

    // Jika Anda ingin menggunakan mutator untuk tanggal pengajuan
    public function getTanggalPengajuanAttribute($value)
    {
        return Carbon::parse($value);
    }

    // Relasi dengan tabel Pengajuan
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class); // Sesuaikan dengan nama model Pengajuan
    }

    // Jika Anda memiliki relasi dengan model lain, Anda bisa definisikan di sini
}

