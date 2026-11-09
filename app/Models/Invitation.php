<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'token', 'jenis_instrumen', 'sekolah_id', 'nama_responden', 'expires_at', 'is_used'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}