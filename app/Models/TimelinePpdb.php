<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelinePpdb extends Model
{
    use HasFactory;

    protected $fillable = [
        'gelombang_id',
        'urutan',
        'nama_tahap',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }
}
