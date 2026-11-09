

<?php $__env->startSection('title', 'Instrumen STEM'); ?>
<?php $__env->startSection('page-title', 'Instrumen STEM'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div>
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-2">
            <a href="<?php echo e(route('instrumen.index')); ?>" class="hover:text-blue-600 transition">Instrumen Pemantauan</a>
            <span>/</span>
            <span class="text-slate-700">Instrumen STEM</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-800">Instrumen STEM</h1>
        <p class="mt-1 text-sm text-slate-500">Pilih kategori instrumen STEM yang tersedia.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card Fasda -->
        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>" class="block bg-white border border-slate-200 rounded-xl p-8 shadow-sm hover:shadow-md transition text-center group">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-600 mb-4 group-hover:bg-blue-100 transition">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition">Fasda (Peserta Pelatihan)</h3>
            <p class="text-sm text-slate-500 mt-2">Instrumen Dampak & Evaluasi Dampak</p>
        </a>

        <!-- Card Diseminasi -->
        <a href="<?php echo e(route('instrumen.stem.diseminasi')); ?>" class="block bg-white border border-slate-200 rounded-xl p-8 shadow-sm hover:shadow-md transition text-center group">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 mb-4 group-hover:bg-emerald-100 transition">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-slate-800 group-hover:text-emerald-600 transition">Diseminasi</h3>
            <p class="text-sm text-slate-500 mt-2">Instrumen Monitoring & Reaction</p>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/index.blade.php ENDPATH**/ ?>