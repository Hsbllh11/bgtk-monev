

<?php $__env->startSection('title', 'Instrumen STEM'); ?>
<?php $__env->startSection('page-title', 'Instrumen STEM'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        /* ===================== TOKEN WARNA (Sama dengan Instrumen Pemantauan) ===================== */
        .i-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; line-height: 1.2; color: var(--ink); }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        /* Grid diubah agar center dan membagi dua layar */
        .i-grid3 { 
            display: grid; 
            gap: 20px; 
            grid-template-columns: repeat(2, minmax(0, 1fr)); 
            max-width: 1200px; 
            margin: 0 auto; 
            width: 100%;
        }
        @media (max-width: 767px) { 
            .i-grid3 { 
                grid-template-columns: 1fr; 
            } 
        }

        /* --- warna pastel --- */
        .c-blue { --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --t-line: #c6d8fb; --t-glow: rgba(37, 99, 235, .55); --t-clip: #8fa9e6; --c: #2563eb; --c-line: #c6d8fb; --c-text: #1d4ed8; --b: #3f5fe0; --b-d: #3450c4; --b-t: #ffffff; }
        .c-emerald { --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%); --t-line: #bfe8d4; --t-glow: rgba(5, 150, 105, .5); --t-clip: #86c9ae; --c: #059669; --c-line: #bfe8d4; --c-text: #047857; --b: #0c9a6a; --b-d: #087f57; --b-t: #ffffff; }

        .i-inst { position: relative; overflow: hidden; background: var(--t-bg); border: 1px solid var(--t-line); border-radius: 18px; transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1); }
        .i-inst:hover { transform: translateY(-3px); box-shadow: 0 18px 30px -20px var(--t-glow); }
        .i-inst::before, .i-inst::after { content: ''; position: absolute; z-index: 0; border-radius: 9999px; pointer-events: none; }
        .i-inst::before { right: -30px; bottom: -42px; width: 124px; height: 124px; background: rgba(255, 255, 255, .38); }
        .i-inst::after { left: -26px; bottom: -46px; width: 92px; height: 92px; background: rgba(255, 255, 255, .24); }
        .i-clip { position: absolute; z-index: 1; right: 30px; top: 12px; color: var(--t-clip); }
        .i-pin { position: absolute; z-index: 1; right: 14px; top: 14px; width: 7px; height: 7px; border-radius: 9999px; background: var(--c); box-shadow: 0 0 0 3px rgba(255, 255, 255, .65); }
        .i-inst-body { position: relative; z-index: 1; padding: 22px 20px 20px; }
        .i-inst-top { display: flex; align-items: flex-start; gap: 14px; }
        .i-inst-text { min-width: 0; flex: 1; padding-top: 2px; }
        .i-inst-ico { display: flex; align-items: center; justify-content: center; flex-shrink: 0; width: 56px; height: 56px; border-radius: 18px; background: #fff; color: var(--c); box-shadow: 0 8px 18px -10px var(--t-glow); }
        .i-badge { display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 9999px; background: rgba(255, 255, 255, .72); border: 1px solid var(--c-line); color: var(--c-text); font-size: 11.5px; font-weight: 700; }
        .i-inst h3 { margin-top: 8px; font-size: 16px; font-weight: 700; letter-spacing: -.01em; color: var(--ink); }
        .i-inst p { margin-top: 4px; font-size: 13px; line-height: 1.7; color: #55637f; }
        .i-actions { margin-top: 18px; padding-top: 16px; border-top: 1px solid rgba(255, 255, 255, .8); display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
        
        .i-btn-main { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 14px; border: 0; border-radius: 12px; background: var(--b); color: var(--b-t); font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer; box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 10px 18px -10px var(--b); transition: background .25s ease, transform .25s ease, box-shadow .25s ease; text-decoration: none; }
        .i-btn-main:hover { background: var(--b-d); transform: translateY(-1px); box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 14px 20px -10px var(--b); }
    </style>

    <div class="i-wrap">
        
        <div>
            <h1 class="d-h1">Instrumen <b>STEM</b></h1>
            <p class="d-crumb">Dashboard &nbsp;›&nbsp; Instrumen &nbsp;›&nbsp; STEM</p>
            <p class="d-desc">Pilih kategori instrumen STEM yang tersedia.</p>
        </div>

        <div class="i-grid3">
            
            <div class="i-inst c-blue">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                <span class="i-pin"></span>
                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H2v-2a4 4 0 014-4h3a4 4 0 014 4v2zM12.5 7.5a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0z" /></svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Kategori 01</span>
                            <h3>Fasda (Peserta Pelatihan)</h3>
                            <p>Instrumen Dampak & Evaluasi Dampak.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>" class="i-btn-main">Buka Menu</a>
                    </div>
                </div>
            </div>

            
            <div class="i-inst c-emerald">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                <span class="i-pin"></span>
                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Kategori 02</span>
                            <h3>Diseminasi</h3>
                            <p>Instrumen Monitoring & Reaction.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="<?php echo e(route('instrumen.stem.diseminasi')); ?>" class="i-btn-main">Buka Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/index.blade.php ENDPATH**/ ?>