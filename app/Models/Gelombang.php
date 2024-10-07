<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_gelombang',
        'jumlah_pendaftar',
        'tanggal_ujian',
        'status',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'gelombang_id', 'id');
    }
}
