<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gelombang_id',
        'nama_siswa',
        'nisn',
        'jenis_kelamin',
        'asal_sekolah',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'email',
        'foto',
        'nomor_wa',
        'sosmed',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nomor_wali',
        'alamat_wali',
        'piagam',
        'ukuran_seragam',
        'akta',
        'kk',
        'ktp',
        'skl_ijazah',
        'surat_tidak_mampu',
        'catatan',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftar()
    {
        return $this->hasOne(Pendaftar::class, 'id_siswa');
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}
