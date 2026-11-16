

<?php $__env->startSection('title', 'Pengisian Wawancara PKGSD MBI'); ?>
<?php $__env->startSection('page-title', 'Pengisian Wawancara PKGSD MBI'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('wawancara.partials.form-pkgsd-mbi', [
        'judul' => 'Instrumen Wawancara PKGSD MBI',
        'action' => route('wawancara.pkgsd-mbi.store'),
        'method' => 'POST',
        'values' => [],
        'batal' => route('wawancara.index'),
        'tombol' => 'Simpan Wawancara',
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/wawancara/create-pkgsd-mbi.blade.php ENDPATH**/ ?>