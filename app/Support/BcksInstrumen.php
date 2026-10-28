<?php

namespace App\Support;

class BcksInstrumen
{
    public static function levels(): array
    {
        return config('bcks.instrumen.levels', []);
    }

    /** Urutan nama level: indeks 0 = Level 1. */
    public static function levelNames(): array
    {
        return array_keys(self::levels());
    }

    public static function namaLevel(int $level): ?string
    {
        return self::levelNames()[$level - 1] ?? null;
    }

    /** ['Reaction' => 12, 'Learning' => 8, ...] */
    public static function jumlahPerLevel(): array
    {
        return array_map(fn ($l) => count($l['indikator'] ?? []), self::levels());
    }

    /** [1 => 12, 2 => 8, 3 => 12, 4 => 8] */
    public static function jumlahPerLevelAngka(): array
    {
        $jumlah = array_values(self::jumlahPerLevel());

        return array_combine(range(1, count($jumlah)), $jumlah);
    }

    /** Nomor global tersimpan di DB: (level 3, nomor 5) => 20 + 5 = 25 */
    public static function nomorGlobal(int $level, int $nomor): ?int
    {
        $jumlah = self::jumlahPerLevelAngka();

        if (! isset($jumlah[$level]) || $nomor < 1 || $nomor > $jumlah[$level]) {
            return null;
        }

        $offset = 0;
        for ($i = 1; $i < $level; $i++) {
            $offset += $jumlah[$i];
        }

        return $offset + $nomor;
    }

    /** BCKS: semua level. Selain BCKS: Level 3 dan 4. */
    public static function levelAktif(bool $isBcks): array
    {
        $nama = self::levelNames();

        return $isBcks ? $nama : array_slice($nama, 2);
    }

    public static function jumlahIndikator(bool $isBcks): int
    {
        return array_sum(array_intersect_key(
            self::jumlahPerLevel(),
            array_flip(self::levelAktif($isBcks))
        ));
    }

    public static function skorMaksimum(bool $isBcks): int
    {
        return self::jumlahIndikator($isBcks) * 4;
    }

    /** ['Reaction' => 48, 'Learning' => 32, 'Behavior' => 48, 'Results' => 32] */
    public static function levelMaksimum(): array
    {
        return array_map(fn ($n) => $n * 4, self::jumlahPerLevel());
    }
}