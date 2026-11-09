

<?php $__env->startSection('title', 'Rekap Evaluasi Dampak STEM'); ?>
<?php $__env->startSection('page-title', 'Rekap Evaluasi Dampak'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Rekap Evaluasi Dampak STEM</h1>
            <p class="text-sm text-slate-500 mt-1">Daftar responden (Guru/Murid) yang telah mengisi form publik.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-sm text-slate-500">
                        <th class="p-4 font-semibold">No</th>
                        <th class="p-4 font-semibold">Tanggal</th>
                        <th class="p-4 font-semibold">Nama Responden</th>
                        <th class="p-4 font-semibold">Peran</th>
                        <th class="p-4 font-semibold">Asal Sekolah</th>
                        <th class="p-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $evaluasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 text-slate-500"><?php echo e($evaluasi->firstItem() + $index); ?></td>
                            <td class="p-4 text-slate-600">
                                <?php echo e(\Illuminate\Support\Carbon::parse($item->tanggal_pengisian)->format('d/m/Y')); ?>

                            </td>
                            <td class="p-4 font-semibold text-slate-700"><?php echo e($item->nama_responden); ?></td>
                            <td class="p-4">
                                <?php if($item->peran_responden === 'Pendidik'): ?>
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Pendidik</span>
                                <?php else: ?>
                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">Murid</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-slate-600"><?php echo e($item->asal_sekolah); ?></td>
                            <td class="p-4 text-center">
                                <!-- Nanti kita buat detailnya -->
                                <button class="text-blue-600 hover:text-blue-800 font-semibold text-xs border border-blue-200 bg-blue-50 px-3 py-1.5 rounded-lg">
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-500">
                                Belum ada responden yang mengisi Evaluasi Dampak.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-200">
            <?php echo e($evaluasi->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/admin/stem/rekap-evaluasi.blade.php ENDPATH**/ ?>