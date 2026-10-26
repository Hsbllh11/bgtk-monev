<?php

namespace App\Support;

class BkSkor
{
    public static function kategori(float $persen): string
    {
        return match (true) {
            $persen > 85 => 'Sangat Baik',
            $persen > 70 => 'Baik',
            $persen > 55 => 'Cukup',
            default => 'Perlu Pembinaan',
        };
    }

    public static function kelas(?string $kategori): string
    {
        return match ($kategori) {
            'Sangat Baik' => 'bg-emerald-100 text-emerald-700',
            'Baik' => 'bg-blue-100 text-blue-700',
            'Cukup' => 'bg-amber-100 text-amber-700',
            'Perlu Pembinaan' => 'bg-red-100 text-red-700',
            default => 'bg-slate-100 text-slate-600',
        };
    }
}