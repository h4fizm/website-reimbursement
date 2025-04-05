<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';

    protected $fillable = [
        'tanggal_pengajuan',
        'nama_pengajuan',
        'deskripsi_pengajuan',
        'file_pengajuan',
        'status',
        'user_id',
    ];

    public function getTanggalPengajuanAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNamaJabatanPenggunaAttribute()
    {
        return $this->user->Nama . ' | ' . $this->user->Jabatan;
    }
}
