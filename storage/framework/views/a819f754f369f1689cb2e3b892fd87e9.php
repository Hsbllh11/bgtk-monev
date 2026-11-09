

<?php $__env->startSection('title', 'Instrumen STEM - Fasda'); ?>
<?php $__env->startSection('page-title', 'Instrumen STEM - Fasda'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div>
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-2">
            <a href="<?php echo e(route('instrumen.index')); ?>" class="hover:text-blue-600 transition">Instrumen Pemantauan</a>
            <span>/</span>
            <a href="<?php echo e(route('instrumen.stem.index')); ?>" class="hover:text-blue-600 transition">Instrumen STEM</a>
            <span>/</span>
            <span class="text-slate-700">Fasda (Peserta Pelatihan)</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-800">Fasda (Peserta Pelatihan)</h1>
        <p class="mt-1 text-sm text-slate-500">Pilih instrumen Fasda yang ingin diisi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Instrumen Dampak (Wawancara) -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-bold text-slate-800">Instrumen Dampak (Wawancara)</h3>
            <p class="text-sm text-slate-500 mt-2 mb-4">Diisi oleh Tim BGTK NTB (Internal).</p>
            <a href="<?php echo e(route('instrumen.stem.fasda.dampak.create')); ?>" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                Isi Instrumen
            </a>
        </div>

        <!-- Card 2: Instrumen Evaluasi Dampak -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-bold text-slate-800">Instrumen Evaluasi Dampak</h3>
            <p class="text-sm text-slate-500 mt-2 mb-4">Diisi oleh Guru Fasda dan Murid.</p>
            <a href="#" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                Isi Instrumen
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda.blade.php ENDPATH**/ ?>