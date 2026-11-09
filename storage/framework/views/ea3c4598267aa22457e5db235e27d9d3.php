<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Publik - MANDALIKA BGTK NTB</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 text-center border border-slate-100">
        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-100 text-blue-600 mb-6">
            <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
        </div>
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Portal Publik Monev</h1>
        <p class="text-slate-500 mb-8 text-sm">Silakan akses link instrumen yang telah dibagikan oleh Tim BGTK NTB untuk mulai mengisi.</p>
        
        <div class="bg-amber-50 border border-amber-200 text-amber-800 text-xs p-4 rounded-xl text-left mb-6">
            <b>Informasi:</b> Anda tidak perlu login untuk mengisi form ini. Pastikan link yang Anda buka sudah benar dan belum kadaluarsa.
        </div>

        <a href="<?php echo e(route('login')); ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline">
            &larr; Kembali ke Halaman Login Petugas
        </a>
    </div>
</body>
</html><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/public/index.blade.php ENDPATH**/ ?>