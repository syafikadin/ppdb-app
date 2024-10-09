<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'wawancara',
        'baca_alquran',
        'tulis_alquran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
