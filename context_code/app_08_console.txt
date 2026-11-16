<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PindahkanSqliteKeMysql extends Command
{
    protected $signature = 'db:pindahkan-sqlite';
    protected $description = 'Salin semua data dari SQLite lama ke database MySQL';

    /**
     * Urutan penting: tabel induk dulu, baru tabel anak (foreign key).
     */
    private array $tabel = [
        'users',
        'sekolahs',
        'instrumens',
        'wawancaras',
        'tindak_lanjuts',
        'bcks_pengisians',
        'bcks_jawaban',
        'bk_questions',
        'bk_submissions',
        'bk_answers',
        'bk_essay_answers',
        'tendiks',
        'gembira_pengisians',
        'pkgsd_mbi_pengisians',
        'sessions',
        'cache',
        'cache_locks',
        'jobs',
        'job_batches',
        'failed_jobs',
        'password_reset_tokens',
    ];

    public function handle(): int
    {
        $sumber = DB::connection('sqlite_lama');
        $tujuan = DB::connection('mysql');

        Schema::connection('mysql')->disableForeignKeyConstraints();

        foreach ($this->tabel as $nama) {
            if (! Schema::connection('sqlite_lama')->hasTable($nama)) {
                $this->warn("Lewati {$nama} (tidak ada di SQLite)");
                continue;
            }

            if (! Schema::connection('mysql')->hasTable($nama)) {
                $this->warn("Lewati {$nama} (tidak ada di MySQL)");
                continue;
            }

            // Hanya salin kolom yang ada di kedua database.
            $kolomMysql = Schema::connection('mysql')->getColumnListing($nama);

            $tujuan->table($nama)->truncate();

            $jumlah = 0;

            $sumber->table($nama)->orderBy(
                Schema::connection('sqlite_lama')->hasColumn($nama, 'id') ? 'id' : DB::raw('1')
            )->chunk(200, function ($baris) use ($tujuan, $nama, $kolomMysql, &$jumlah) {
                $data = $baris->map(function ($row) use ($kolomMysql) {
                    return collect((array) $row)
                        ->only($kolomMysql)
                        ->all();
                })->all();

                $tujuan->table($nama)->insert($data);
                $jumlah += count($data);
            });

            $this->info("{$nama}: {$jumlah} baris disalin");
        }

        Schema::connection('mysql')->enableForeignKeyConstraints();

        $this->newLine();
        $this->info('Selesai memindahkan data.');

        return self::SUCCESS;
    }
}