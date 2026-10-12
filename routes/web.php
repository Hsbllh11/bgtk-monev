<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\InstrumenController;
use App\Http\Controllers\WawancaraController;
use App\Http\Controllers\TindakLanjutController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\BcksPengisianController;


// ============================================================
// AUTHENTICATION
// ============================================================

Route::get('/login', [
    LoginController::class,
    'showLoginForm'
])->name('login');

Route::post('/login', [
    LoginController::class,
    'login'
])->name('login.process');

Route::post('/logout', [
    LoginController::class,
    'logout'
])->name('logout');


// ============================================================
// AREA YANG MEMERLUKAN LOGIN
// ============================================================

Route::middleware('auth')->group(function () {

    // ========================================================
    // DASHBOARD
    // ========================================================

    Route::get('/', [
        DashboardController::class,
        'index'
    ]);

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');


    // ========================================================
    // INSTRUMEN PEMANTAUAN
    // ========================================================

    Route::resource('instrumen', InstrumenController::class)
        ->parameters([
            'instrumen' => 'instrumen',
        ]);


    // ========================================================
    // BCKS
    // ========================================================

    Route::resource('bcks', BcksPengisianController::class)
        ->parameters([
            'bcks' => 'bcksPengisian',
        ]);

    Route::get(
        'bcks/{bcksPengisian}/cetak',
        [BcksPengisianController::class, 'cetak']
    )->name('bcks.cetak');


    // ========================================================
    // BK
    // ========================================================

    // Daftar / Riwayat Pengisian BK
    // =========================
// INSTRUMEN BK
// =========================

    Route::get('/bk', [
        \App\Http\Controllers\BKController::class,
        'index'
    ])->name('bk.index');

    Route::get('/bk/create', [
        \App\Http\Controllers\BKController::class,
        'create'
    ])->name('bk.create');

    Route::post('/bk', [
        \App\Http\Controllers\BKController::class,
        'store'
    ])->name('bk.store');

    Route::get('/bk/{submission}', [
        \App\Http\Controllers\BKController::class,
        'show'
    ])->name('bk.show');

    Route::get('/bk/{submission}/edit', [
        \App\Http\Controllers\BKController::class,
        'edit'
    ])->name('bk.edit');

    Route::put('/bk/{submission}', [
        \App\Http\Controllers\BKController::class,
        'update'
    ])->name('bk.update');


    // ========================================================
    // DATA SEKOLAH
    // ========================================================

    Route::resource('sekolah', SekolahController::class);


    // ========================================================
    // LEMBAR WAWANCARA
    // ========================================================

    Route::resource('wawancara', WawancaraController::class)
        ->parameters([
            'wawancara' => 'wawancara',
        ]);


    // ========================================================
    // RENCANA TINDAK LANJUT
    // ========================================================

    Route::resource(
        'tindak-lanjut',
        TindakLanjutController::class
    )->parameters([
                'tindak-lanjut' => 'tindakLanjut',
            ]);


    // ========================================================
    // PANDUAN PENGISIAN
    // ========================================================

    Route::get('/panduan', function () {
        return view('panduan.index');
    });


    // ========================================================
    // PROFIL SAYA
    // ========================================================

    Route::get('/profil', function () {
        return view('profil.index');
    });

});