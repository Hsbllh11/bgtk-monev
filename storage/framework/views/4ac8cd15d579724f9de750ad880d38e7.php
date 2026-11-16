<?php $__env->startSection('title', 'Manajemen Akun'); ?>
<?php $__env->startSection('page-title', 'Manajemen Akun'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $akunNonaktif = max($totalAkun - $akunAktif, 0);
        $adaFilter = request()->hasAny(['search', 'status']);
    ?>

    <style>
        /* ===================== TOKEN WARNA (sama dengan dashboard) ===================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --p-800: #1e40af;
            --accent: #f5b82e;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
        }

        .d-wrap {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
        }

        .d-card-h {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -.01em;
        }

        .d-card-s {
            margin-top: 2px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 20px 14px;
        }

        .d-pill {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 9px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 11.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* --- judul halaman --- */
        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 640px) {
            .d-title-row {
                flex-direction: column;
            }
        }

        .d-h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -.02em;
            color: var(--ink);
            line-height: 1.2;
        }

        .d-h1 b {
            font-weight: 700;
        }

        .d-crumb {
            margin-top: 4px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* --- tombol --- */
        .d-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            height: 46px;
            padding: 0 18px;
            border: 0;
            border-radius: 14px;
            background: var(--p-600);
            color: #fff;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .7);
            transition: transform .25s ease, background .25s ease;
        }

        .d-btn:hover {
            background: var(--p-700);
            transform: translateY(-1px);
        }

        .d-btn svg {
            transition: transform .3s ease;
        }

        .d-btn.plus:hover svg {
            transform: rotate(90deg);
        }

        .d-btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 46px;
            padding: 0 18px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            color: #475569;
            font-size: 13.5px;
            font-weight: 600;
            transition: background .2s, color .2s;
        }

        .d-btn-ghost:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        /* --- tile KPI --- */
        .d-tiles {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        @media (min-width: 900px) {
            .d-tiles {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 520px) {
            .d-tiles {
                grid-template-columns: 1fr;
            }
        }

        .d-tile {
            position: relative;
            text-align: center;
            padding: 22px 16px 18px;
            overflow: hidden;
            background: var(--t-bg, var(--p-50));
            border: 1px solid var(--t-line, #dfe8fb);
            border-radius: 18px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }

        .d-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -20px var(--t-glow, rgba(37, 99, 235, .6));
        }

        .d-tile-clip {
            position: absolute;
            left: 12px;
            top: 12px;
            color: var(--t-clip, #a9bde6);
        }

        .d-tile-dot {
            position: absolute;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--p-600);
        }

        .d-tile-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 10px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 18px -10px var(--t-glow, rgba(37, 99, 235, .55));
        }

        .d-tile-label {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-tile-val {
            margin-top: 4px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-tile-val small {
            font-size: 15px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-tile-note {
            margin-top: 6px;
            font-size: 11.5px;
            color: #55637f;
        }

        .t-blue {
            --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --t-line: #c6d8fb;
            --t-glow: rgba(37, 99, 235, .55);
            --t-clip: #8fa9e6;
        }

        .t-mint {
            --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --t-line: #bfe8d4;
            --t-glow: rgba(5, 150, 105, .5);
            --t-clip: #86c9ae;
        }

        .t-rose {
            --t-bg: linear-gradient(160deg, #fff0f2 0%, #ffdde2 100%);
            --t-line: #fbcad2;
            --t-glow: rgba(225, 29, 72, .45);
            --t-clip: #e59aa6;
        }

        .d-tile::before,
        .d-tile::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-tile::before {
            right: -30px;
            bottom: -42px;
            width: 124px;
            height: 124px;
            background: rgba(255, 255, 255, .38);
        }

        .d-tile::after {
            left: -26px;
            bottom: -46px;
            width: 92px;
            height: 92px;
            background: rgba(255, 255, 255, .24);
        }

        .d-tile>p,
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        .d-tile-dot {
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        /* --- notifikasi --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        .d-alert.ok {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .d-alert.err {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        .d-alert ul {
            margin: 0;
            padding-left: 18px;
            list-style: disc;
            font-weight: 500;
        }

        /* --- filter --- */
        .d-filter {
            padding: 20px;
        }

        .d-filter-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .d-span-all {
                grid-column: 1 / -1;
            }
        }

        @media (min-width: 1280px) {
            .d-filter-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .d-span-all {
                grid-column: span 3;
            }
        }

        .d-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-field {
            width: 100%;
            height: 44px;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: #334155;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .d-field::placeholder {
            color: #94a3b8;
        }

        .d-field:focus {
            border-color: var(--p-500);
            box-shadow: 0 0 0 4px var(--p-100);
        }

        .d-search {
            position: relative;
        }

        .d-search svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .d-search .d-field {
            padding-left: 40px;
        }

        .d-filter-foot {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 18px;
        }

        /* --- badge --- */
        .d-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        /* --- tabel --- */
        .d-table {
            width: 100%;
            border-collapse: collapse;
        }

        .d-table th {
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        .d-table th.right {
            text-align: right;
        }

        .d-table td {
            padding: 14px 20px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .d-table tbody tr {
            transition: background .2s;
        }

        .d-table tbody tr:hover {
            background: #f7f9ff;
        }

        .d-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .d-table .nm {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-table .sub {
            margin-top: 2px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .d-table .txt {
            font-size: 12.5px;
            color: #475569;
            white-space: nowrap;
        }

        .d-table .mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 12.5px;
            color: #475569;
            white-space: nowrap;
        }

        /* --- tombol aksi ikon --- */
        .d-act {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: 0;
            border-radius: 11px;
            background: transparent;
            color: var(--ink);
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .d-act:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        .d-act.danger {
            color: #e11d48;
        }

        .d-act.danger:hover {
            background: #fff1f2;
            color: #be123c;
        }

        /* nonaktifkan akun (amber) */
        .d-act.warn {
            color: #d97706;
        }

        .d-act.warn:hover {
            background: #fffbeb;
            color: #b45309;
        }

        /* aktifkan kembali akun (hijau) */
        .d-act.ok {
            color: #059669;
        }

        .d-act.ok:hover {
            background: #ecfdf5;
            color: #047857;
        }

        /* --- empty state --- */
        .d-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 56px 24px;
            text-align: center;
        }

        .d-empty-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: var(--p-50);
            color: var(--p-600);
        }
    </style>

    <div class="d-wrap">

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Manajemen <b>Akun</b></h1>
                    <p class="d-crumb">Dashboard &nbsp;›&nbsp; Manajemen Akun</p>
                    <p class="d-desc">Kelola akun Petugas Monitoring dan Evaluasi.</p>
                </div>

                <a href="<?php echo e(route('manajemen-akun.create')); ?>" class="d-btn plus">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Tambah Akun
                </a>
            </div>
        </section>

        
        <?php if(session('success')): ?>
            <div class="d-alert ok">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="d-alert err">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v4m0 4h.01" />
                </svg>
                <p><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="d-alert err">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v4m0 4h.01" />
                </svg>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <div class="d-tiles">

            
            <div class="d-tile t-blue">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color: var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H2v-2a4 4 0 014-4h3a4 4 0 014 4v2zM12.5 7.5a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0zM16 4.2a3.5 3.5 0 010 6.6" />
                    </svg>
                </span>
                <p class="d-tile-label">Total Petugas</p>
                <p class="d-tile-val"><?php echo e($totalAkun); ?></p>
                <p class="d-tile-note">Seluruh akun petugas</p>
            </div>

            
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
                <p class="d-tile-label">Akun Aktif</p>
                <p class="d-tile-val"><?php echo e($akunAktif); ?><small> / <?php echo e($totalAkun); ?></small></p>
                <p class="d-tile-note">Dapat digunakan untuk login</p>
            </div>

            
            <div class="d-tile t-rose">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#f43f5e"></span>
                <span class="d-tile-ico" style="color:#e11d48">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 5.636l-12.728 12.728M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <p class="d-tile-label">Akun Nonaktif</p>
                <p class="d-tile-val"><?php echo e($akunNonaktif); ?><small> / <?php echo e($totalAkun); ?></small></p>
                <p class="d-tile-note">Tidak dapat digunakan untuk login</p>
            </div>

        </div>

        
        <form method="GET" action="<?php echo e(route('manajemen-akun.index')); ?>" class="d-card d-filter">

            <div style="margin-bottom:16px">
                <h2 class="d-card-h">Filter Data Petugas</h2>
                <p class="d-card-s">Cari akun berdasarkan nama, username, NIP, atau status.</p>
            </div>

            <div class="d-filter-grid">

                <div>
                    <label for="status" class="d-label">Status</label>
                    <select id="status" name="status" class="d-field">
                        <option value="">Semua Status</option>
                        <option value="aktif" <?php if(request('status') === 'aktif'): echo 'selected'; endif; ?>>Aktif</option>
                        <option value="nonaktif" <?php if(request('status') === 'nonaktif'): echo 'selected'; endif; ?>>Nonaktif</option>
                    </select>
                </div>

                <div class="d-span-all">
                    <label for="search" class="d-label">Pencarian</label>
                    <div class="d-search">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <input id="search" type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Cari nama, username, atau NIP..." class="d-field">
                    </div>
                </div>

            </div>

            <div class="d-filter-foot">
                <?php if($adaFilter): ?>
                    <a href="<?php echo e(route('manajemen-akun.index')); ?>" class="d-btn-ghost">Reset Filter</a>
                <?php endif; ?>

                <button type="submit" class="d-btn">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                    Terapkan Filter
                </button>
            </div>

        </form>

        
        <div class="d-card">

            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Daftar Petugas Monev</h2>
                    <p class="d-card-s">Akun petugas monitoring dan evaluasi yang terdaftar.</p>
                </div>

                <span class="d-pill"><?php echo e($akun->total()); ?> akun</span>
            </div>

            <div style="overflow-x:auto">
                <table class="d-table" style="min-width:850px">

                    <thead>
                        <tr>
                            <th style="width:64px">No</th>
                            <th>Nama Petugas</th>
                            <th>Username</th>
                            <th>NIP</th>
                            <th>Status</th>
                            <th class="right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $akun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>

                                <td class="txt"><?php echo e($akun->firstItem() + $loop->index); ?></td>

                                <td style="min-width:200px">
                                    <p class="nm"><?php echo e($item->name); ?></p>
                                    <p class="sub"><?php echo e($item->email); ?></p>
                                </td>

                                <td class="txt"><?php echo e($item->username); ?></td>

                                <td class="mono"><?php echo e($item->nip); ?></td>

                                <td style="white-space:nowrap">
                                    <?php if($item->is_active): ?>
                                        <span class="d-badge" style="background:#d1fae5;color:#047857">Aktif</span>
                                    <?php else: ?>
                                        <span class="d-badge" style="background:#ffe4e6;color:#be123c">Nonaktif</span>
                                    <?php endif; ?>
                                </td>

                                
                                <td style="white-space:nowrap;text-align:right">
                                    <div style="display:flex;align-items:center;justify-content:flex-end;gap:2px">

                                        
                                        <a href="<?php echo e(route('manajemen-akun.show', $item->id)); ?>" title="Lihat Detail"
                                            aria-label="Lihat Detail" class="d-act">
                                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        
                                        <a href="<?php echo e(route('manajemen-akun.edit', $item->id)); ?>" title="Edit Akun"
                                            aria-label="Edit Akun" class="d-act">
                                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        
                                        <?php if($item->id !== auth()->id()): ?>
                                            <form method="POST" action="<?php echo e(route('manajemen-akun.destroy', $item->id)); ?>"
                                                onsubmit="return confirm('<?php echo e($item->is_active ? 'Nonaktifkan' : 'Aktifkan kembali'); ?> akun <?php echo e(addslashes($item->name)); ?>?')"
                                                style="display:inline-flex;margin:0">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <?php if($item->is_active): ?>
                                                    <button type="submit" title="Nonaktifkan Anggota" aria-label="Nonaktifkan Anggota"
                                                        class="d-act warn">
                                                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M18.364 5.636l-12.728 12.728M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                <?php else: ?>
                                                    <button type="submit" title="Aktifkan Anggota" aria-label="Aktifkan Anggota"
                                                        class="d-act ok">
                                                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                <?php endif; ?>
                                            </form>
                                        <?php endif; ?>

                                        
                                        <form method="POST" action="<?php echo e(route('manajemen-akun.hapus', $item->id)); ?>"
                                            onsubmit="return confirm('Hapus akun <?php echo e(addslashes($item->name)); ?> secara permanen? Tindakan ini tidak dapat dibatalkan.')"
                                            style="display:inline-flex;margin:0">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" title="Hapus Akun" aria-label="Hapus Akun"
                                                class="d-act danger">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" style="padding:0">
                                    <div class="d-empty">

                                        <div class="d-empty-ico">
                                            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H2v-2a4 4 0 014-4h3a4 4 0 014 4v2zM12.5 7.5a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0zM16 4.2a3.5 3.5 0 010 6.6" />
                                            </svg>
                                        </div>

                                        <h3 class="d-card-h" style="margin-top:6px">Data akun tidak ditemukan</h3>

                                        <p class="d-card-s" style="max-width:420px;line-height:1.7">
                                            Coba ubah kata kunci pencarian atau filter status.
                                        </p>

                                        <?php if($adaFilter): ?>
                                            <a href="<?php echo e(route('manajemen-akun.index')); ?>" class="d-btn-ghost"
                                                style="margin-top:8px">
                                                Reset Filter
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

            
            <?php if($akun->hasPages()): ?>
                <div style="border-top:1px solid var(--line);padding:16px 20px">
                    <?php echo e($akun->links()); ?>

                </div>
            <?php endif; ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/manajemen-akun/index.blade.php ENDPATH**/ ?>