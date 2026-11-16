<?php

use Illuminate\Support\Facades\Route;

// ============================================================
// CONTROLLERS
// ============================================================

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\InstrumenController;
use App\Http\Controllers\WawancaraController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\BcksPengisianController;
use App\Http\Controllers\TendikController;
use App\Http\Controllers\ManajemenAkunController;
use App\Http\Controllers\GembiraController;
use App\Http\Controllers\PkgsdMbiController;
use App\Http\Controllers\CetakGabunganController;
use App\Http\Controllers\Stem\StemFasdaDampakController;
use App\Http\Controllers\Stem\StemFasdaEvaluasiController;
use App\Http\Controllers\Stem\StemDiseminasiReactionController;
use App\Http\Controllers\Stem\StemDiseminasiMonitoringController;
use App\Http\Controllers\Stem\StemHistoryController;
use App\Http\Controllers\PublicController; // <-- TAMBAHKAN INI


// ============================================================
// AUTENTIKASI
// ============================================================

Route::get('/login', [
    LoginController::class,
    'showLoginForm',
])->name('login');

Route::post('/login', [
    LoginController::class,
    'login',
])->name('login.process');

Route::post('/logout', [
    LoginController::class,
    'logout',
])->name('logout');


// ============================================================
// AREA PUBLIK (TANPA LOGIN) - TAMBAHKAN DISINI
// ============================================================

Route::prefix('publik')->name('public.')->group(function () {
    // Halaman utama pilihan instrumen
    Route::get('/', [PublicController::class, 'index'])->name('index');

    // Instrumen Reaction
    Route::get('/reaction/create', [StemDiseminasiReactionController::class, 'publicForm'])->name('reaction.create');
    Route::post('/reaction', [StemDiseminasiReactionController::class, 'publicStore'])->name('reaction.store');

    // Instrumen Evaluasi Dampak
    Route::get('/evaluasi/create', [StemFasdaEvaluasiController::class, 'publicForm'])->name('evaluasi.create');
    Route::post('/evaluasi', [StemFasdaEvaluasiController::class, 'publicStore'])->name('evaluasi.store');
});


// ============================================================
// AREA APLIKASI - WAJIB LOGIN
// ============================================================

Route::middleware('auth')->group(function () {

    // ========================================================
    // DASHBOARD
    // ========================================================

    Route::get('/', [
        DashboardController::class,
        'index',
    ]);

    Route::get('/dashboard', [
        DashboardController::class,
        'index',
    ])->name('dashboard');


    // ========================================================
    // INSTRUMEN STEM  ⬅️ HARUS DI ATAS Route::resource('instrumen')
    // ========================================================

    Route::prefix('instrumen/stem')->name('instrumen.stem.')->group(function () {
        Route::get('/', function () { return view('instrumen.stem.index'); })->name('index');
        Route::get('/fasda', function () { return view('instrumen.stem.fasda'); })->name('fasda');
        Route::get('/diseminasi', function () { return view('instrumen.stem.diseminasi'); })->name('diseminasi');

        // =====================================================
        // 1. INSTRUMEN FASDA DAMPAK (Wawancara) — Tanpa Index
        // =====================================================
        Route::get('/fasda/dampak/create', [StemFasdaDampakController::class, 'create'])->name('fasda.dampak.create');
        Route::post('/fasda/dampak', [StemFasdaDampakController::class, 'store'])->name('fasda.dampak.store');

        // ✅ ROUTE SHOW — dipakai oleh 'show_route' => route('instrumen.stem.fasda.dampak.show', ...)
        Route::get('/fasda/dampak/{dampak}', [StemFasdaDampakController::class, 'show'])->name('fasda.dampak.show');

        Route::get('/fasda/dampak/{dampak}/edit', [StemFasdaDampakController::class, 'edit'])->name('fasda.dampak.edit');
        Route::put('/fasda/dampak/{dampak}', [StemFasdaDampakController::class, 'update'])->name('fasda.dampak.update');
        Route::delete('/fasda/dampak/{dampak}', [StemFasdaDampakController::class, 'destroy'])->name('fasda.dampak.destroy');

        // ✅ ROUTE CETAK — tetap dipertahankan (dipakai untuk tombol cetak terpisah)
        Route::get('/fasda/dampak/{dampak}/cetak', [StemFasdaDampakController::class, 'cetak'])->name('fasda.dampak.cetak');


        // =====================================================
        // 2. INSTRUMEN FASDA EVALUASI
        // =====================================================
        Route::get('/fasda/evaluasi/create', [StemFasdaEvaluasiController::class, 'create'])->name('fasda.evaluasi.create');
        Route::post('/fasda/evaluasi', [StemFasdaEvaluasiController::class, 'store'])->name('fasda.evaluasi.store');

        Route::get('/fasda/evaluasi/{evaluasi}', [StemFasdaEvaluasiController::class, 'show'])->name('fasda.evaluasi.show');
        Route::get('/fasda/evaluasi/{evaluasi}/edit', [StemFasdaEvaluasiController::class, 'edit'])->name('fasda.evaluasi.edit');
        Route::put('/fasda/evaluasi/{evaluasi}', [StemFasdaEvaluasiController::class, 'update'])->name('fasda.evaluasi.update');
        Route::delete('/fasda/evaluasi/{evaluasi}', [StemFasdaEvaluasiController::class, 'destroy'])->name('fasda.evaluasi.destroy');

        // ✅ BARU: ROUTE CETAK Evaluasi (ditambahkan)
        Route::get('/fasda/evaluasi/{evaluasi}/cetak', [StemFasdaEvaluasiController::class, 'cetak'])->name('fasda.evaluasi.cetak');


        // =====================================================
        // 3. INSTRUMEN DISEMINASI REACTION
        // =====================================================
        Route::get('/diseminasi/reaction/create', [StemDiseminasiReactionController::class, 'create'])->name('diseminasi.reaction.create');
        Route::post('/diseminasi/reaction', [StemDiseminasiReactionController::class, 'store'])->name('diseminasi.reaction.store');

        Route::get('/diseminasi/reaction/{reaction}', [StemDiseminasiReactionController::class, 'show'])->name('diseminasi.reaction.show');
        Route::get('/diseminasi/reaction/{reaction}/edit', [StemDiseminasiReactionController::class, 'edit'])->name('diseminasi.reaction.edit');
        Route::put('/diseminasi/reaction/{reaction}', [StemDiseminasiReactionController::class, 'update'])->name('diseminasi.reaction.update');
        Route::delete('/diseminasi/reaction/{reaction}', [StemDiseminasiReactionController::class, 'destroy'])->name('diseminasi.reaction.destroy');

        // ✅ BARU: ROUTE CETAK Reaction (ditambahkan)
        Route::get('/diseminasi/reaction/{reaction}/cetak', [StemDiseminasiReactionController::class, 'cetak'])->name('diseminasi.reaction.cetak');


        // =====================================================
        // 4. INSTRUMEN MONITORING DISEMINASI
        // =====================================================
        Route::get('/diseminasi/monitoring/create', [StemDiseminasiMonitoringController::class, 'create'])->name('diseminasi.monitoring.create');
        Route::post('/diseminasi/monitoring', [StemDiseminasiMonitoringController::class, 'store'])->name('diseminasi.monitoring.store');

        Route::get('/diseminasi/monitoring/{monitoring}', [StemDiseminasiMonitoringController::class, 'show'])->name('diseminasi.monitoring.show');
        Route::get('/diseminasi/monitoring/{monitoring}/edit', [StemDiseminasiMonitoringController::class, 'edit'])->name('diseminasi.monitoring.edit');
        Route::put('/diseminasi/monitoring/{monitoring}', [StemDiseminasiMonitoringController::class, 'update'])->name('diseminasi.monitoring.update');
        Route::delete('/diseminasi/monitoring/{monitoring}', [StemDiseminasiMonitoringController::class, 'destroy'])->name('diseminasi.monitoring.destroy');

        // ✅ BARU: ROUTE CETAK Monitoring (ditambahkan)
        Route::get('/diseminasi/monitoring/{monitoring}/cetak', [StemDiseminasiMonitoringController::class, 'cetak'])->name('diseminasi.monitoring.cetak');


        // =====================================================
        // Route untuk mengambil partial tabel riwayat (AJAX/HTML)
        // =====================================================
        Route::get('/riwayat/{kategori}', [StemHistoryController::class, 'index'])->name('riwayat');
    });


    // ========================================================
    // RIWAYAT INSTRUMEN PEMANTAUAN (Bawaan awal)
    // ========================================================

    Route::resource('instrumen', InstrumenController::class)
        ->parameters([
            'instrumen' => 'instrumen',
        ]);


    // ========================================================
    // INSTRUMEN BCKS
    // ========================================================

    Route::resource('bcks', BcksPengisianController::class)
        ->parameters([
            'bcks' => 'bcksPengisian',
        ]);

    Route::get(
        '/bcks/{bcksPengisian}/cetak',
        [BcksPengisianController::class, 'cetak']
    )->name('bcks.cetak');

    Route::get(
        '/bcks/{bcksPengisian}/histori-lama',
        [BcksPengisianController::class, 'historiLama']
    )->name('bcks.histori');


    // ========================================================
    // INSTRUMEN BIMBINGAN DAN KONSELING (BK)
    // ========================================================

    Route::get('/bk', [BKController::class, 'index'])->name('bk.index');
    Route::get('/bk/create', [BKController::class, 'create'])->name('bk.create');
    Route::post('/bk', [BKController::class, 'store'])->name('bk.store');
    Route::get('/bk/{submission}', [BKController::class, 'show'])->name('bk.show');
    Route::get('/bk/{submission}/edit', [BKController::class, 'edit'])->name('bk.edit');
    Route::get('/bk/{submission}/cetak', [BKController::class, 'cetak'])->name('bk.cetak');
    Route::put('/bk/{submission}', [BKController::class, 'update'])->name('bk.update');
    Route::delete('/bk/{submission}', [BKController::class, 'destroy'])->name('bk.destroy');


    // ========================================================
    // INSTRUMEN TENAGA KEPENDIDIKAN (TENDIK)
    // ========================================================

    Route::resource('tendik', TendikController::class);

    Route::get('/tendik/{tendik}/cetak', [
        TendikController::class,
        'cetak',
    ])->name('tendik.cetak');


    // ========================================================
    // INSTRUMEN MATEMATIKA GEMBIRA
    // ========================================================

    Route::resource('gembira', GembiraController::class);

    Route::get('/gembira/{gembira}/cetak', [
        GembiraController::class,
        'cetak',
    ])->name('gembira.cetak');


    // ========================================================
    // INSTRUMEN PKGSD MBI
    // ========================================================

    Route::resource('pkgsd-mbi', PkgsdMbiController::class)
        ->parameters([
            'pkgsd-mbi' => 'pkgsdMbi',
        ]);

    Route::get('/pkgsd-mbi/{pkgsdMbi}/cetak', [PkgsdMbiController::class, 'cetak'])
        ->name('pkgsd-mbi.cetak');


    // ========================================================
    // GABUNG & CETAK PDF
    // ========================================================

    Route::get('/cetak-gabungan', [CetakGabunganController::class, 'index'])
        ->name('cetak-gabungan.index');

    Route::post('/cetak-gabungan', [CetakGabunganController::class, 'cetak'])
        ->name('cetak-gabungan.cetak');


    // ========================================================
    // DATA SEKOLAH
    // ========================================================

    Route::resource('sekolah', SekolahController::class);


    // ========================================================
    // LEMBAR WAWANCARA
    // ========================================================

    Route::get('/wawancara/bcks', [WawancaraController::class, 'createBcks'])->name('wawancara.bcks.create');
    Route::get('/wawancara/{wawancara}/cetak-bcks', [WawancaraController::class, 'cetakBcks'])->name('wawancara.cetak-bcks');

    Route::get('/wawancara/bk', [WawancaraController::class, 'createBk'])->name('wawancara.bk.create');
    Route::post('/wawancara/bk', [WawancaraController::class, 'storeBk'])->name('wawancara.bk.store');

    Route::get('/wawancara/tendik', [WawancaraController::class, 'createTendik'])->name('wawancara.tendik.create');
    Route::post('/wawancara/tendik', [WawancaraController::class, 'storeTendik'])->name('wawancara.tendik.store');

    Route::get('/wawancara/gembira', [WawancaraController::class, 'createGembira'])->name('wawancara.gembira.create');
    Route::post('/wawancara/gembira', [WawancaraController::class, 'storeGembira'])->name('wawancara.gembira.store');

    Route::get('/wawancara/pkgsd-mbi', [WawancaraController::class, 'createPkgsdMbi'])->name('wawancara.pkgsd-mbi.create');
    Route::post('/wawancara/pkgsd-mbi', [WawancaraController::class, 'storePkgsdMbi'])->name('wawancara.pkgsd-mbi.store');

    Route::get('/wawancara/{wawancara}/cetak', [WawancaraController::class, 'cetak'])->name('wawancara.cetak');

    Route::resource('wawancara', WawancaraController::class)
        ->parameters([
            'wawancara' => 'wawancara',
        ]);


    // ========================================================
    // RENCANA TINDAK LANJUT
    // ========================================================

    Route::resource('tindak-lanjut', TindakLanjutController::class)
        ->parameters([
            'tindak-lanjut' => 'tindakLanjut',
        ]);


    // ========================================================
    // PANDUAN PENGISIAN
    // ========================================================

    Route::get('/panduan', function () {
        return view('panduan.index');
    });


    // ========================================================
    // PROFIL PENGGUNA
    // ========================================================

    Route::get('/profil', function () {
        return view('profil.index');
    });


    // ========================================================
    // ADMINISTRASI AKUN - KHUSUS ADMIN
    // ========================================================

    Route::middleware('admin')->group(function () {
        Route::delete('manajemen-akun/{manajemen_akun}/hapus', [
            ManajemenAkunController::class,
            'hapus',
        ])->name('manajemen-akun.hapus');

        Route::resource('manajemen-akun', ManajemenAkunController::class)
            ->parameters([
                'manajemen-akun' => 'manajemen_akun',
            ]);
    });

});