<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolahs';

    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'jenjang',
        'kabupaten_kota',
        'kecamatan',
        'alamat',
        'status_monitoring',
        'tahun_monitoring',
    ];

    protected $casts = [
        'tahun_monitoring' => 'integer',
    ];

    /**
     * Relasi ke Wawancara
     */
    public function wawancaras()
    {
        return $this->hasMany(Wawancara::class);
    }
    public function tindakLanjuts()
    {
        return $this->hasMany(TindakLanjut::class);
    }
}