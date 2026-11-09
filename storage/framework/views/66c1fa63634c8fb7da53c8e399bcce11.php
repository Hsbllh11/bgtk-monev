<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil - MANDALIKA BGTK NTB</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 text-center border border-slate-100">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600 mb-6">
            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Terima Kasih!</h1>
        <p class="text-slate-500 mb-8 text-sm">Instrumen Evaluasi Dampak berhasil disimpan. Kontribusi Anda sangat berarti bagi kemajuan pendidikan.</p>
        <a href="<?php echo e(route('login')); ?>" class="inline-flex rounded-xl bg-slate-800 px-6 py-3 text-sm font-bold text-white hover:bg-slate-900">Selesai</a>
    </div>
</body>
</html><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/public/success.blade.php ENDPATH**/ ?>